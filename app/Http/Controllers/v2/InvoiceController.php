<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\v2\InvoiceRequest;
use App\Http\Resources\InvoiceResoruce;
use App\Mail\PurchaseConfirmation;
use App\Models\Invoice;
use App\Models\Plan;
use App\Models\StateFee;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    // public function index(): JsonResponse
    public function index(): JsonResource
    {
        $invoice = Invoice::with(['plan.feature', 'document_type', 'state_fee.structure', 'state_fee.state.benefist', 'company.termination', 'company.field', 'bonus'])->get();
        // return response()->json( $invoice,200);
        // dd(InvoiceResoruce::collection($invoice));
        // Utiliza CompanyResource para dar formato a la respuesta JSON
        return InvoiceResoruce::collection($invoice);
        //return response()->json(Invoice::with(['plan.feature','state_fee.structure','state_fee.state.benefist','company.termination'])->get(), 200);
    }


    // public function store(InvoiceRequest $request): JsonResponse
    public function store(InvoiceRequest $request)
    {
        // $validator = $request->validated(); // Esto ejecutará las reglas de validación del InvoiceRequest

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors()->toArray(),
        //     ], 422); // Código de estado HTTP 422 para errores de validación
        // }

        // Obtener los IDs de plan, state_fee y bonus de la solicitud
        $planId = $request->input('plan_id');
        $stateFeeId = $request->input('state_fee_id');
        $bonusId = $request->input('bonus_id');



        // Consultar los precios correspondientes a los IDs
        $plan = Plan::where('id', $planId)->first();
        $stateFee = StateFee::where('id', $stateFeeId)->with(['state.benefist'])->first();


        if (!$plan || !$stateFee) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron los precios para los IDs proporcionados'
            ], 404);
        }

        $planPrice = $plan->planPrice;
        $feePrice = $stateFee->feePrice;
        $benefitsPrice = $stateFee->state->benefist->benefistPrice ?? 0.00;

        $currentDate = Carbon::now();
        $planPeriod = $plan->planPeriod;

        $plan_start_date = $currentDate->copy();
        $plan_end_date = $currentDate->copy();

        if ($planPeriod === 'ANNUAL PAYMENT') {
            $plan_end_date->addYear();
        } else if ($planPeriod === 'MONTHLY PAYMENT') {
            $plan_end_date->addMonth();
        }

        // Calcular el total
        $total = (float)$planPrice + (float)$feePrice + (float)$benefitsPrice;

        // Asignar el total al campo "total" de la solicitud
        $request->merge(['total' => $total]);
        $request->merge(['plan_start_date' => $plan_start_date]);

        $request->merge(['plan_end_date' => $plan_end_date]);


        // Crear la factura
        $data = Invoice::create($request->all());

        return redirect()->route('invoices.show', ['id' => $data['id'], 'mail' => true]);
        // return redirect('/invoice/' . $data['id']);

        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }



    // public function show($id): JsonResponse
    public function show($id, $mail = 'false', $PDF = 'false')
    {

        $invoice = Invoice::with(['plan.feature', 'document_type', 'state_fee.structure', 'state_fee.state.benefist', 'company.termination', 'company.field','bonus'])->find($id);

        if (!$invoice) {
            return new JsonResource([
                'success' => true,
                'message' => 'Invoice no encontrado'
            ]);
        }

        // Convertir los valores a booleanos usando filter_var()
        $mail = filter_var($mail, FILTER_VALIDATE_BOOLEAN);
        $PDF = filter_var($PDF, FILTER_VALIDATE_BOOLEAN);

        // dd($mail);


        if (!is_bool($mail) || !is_bool($PDF)) {
            return new JsonResource([
                'success' => true,
                'message' => 'valores no valido'
            ]);
        }



        $invoiceResource  = new InvoiceResoruce($invoice);

        if ($mail) {

            $dataEmail = $invoiceResource->toArray(request());
            // dd($data);
            Mail::to($dataEmail['company']['emailAddress'])->send(new PurchaseConfirmation($dataEmail));
        }

        if ($PDF) {
            $data = json_decode($invoiceResource->toJson(), true);

            // return view('summary.pdf',compact('data'));



            // Render the 'pdf.example' view with the data
            $pdf = pdf::loadView('summary.pdf', compact('data'));
            // return $pdf->stream('pdf.summary');
            // Configura la respuesta HTTP
            $invoiceResource = new Response($pdf->output());
            $invoiceResource->header('Content-Type', 'application/pdf');
            $invoiceResource->header('Content-Disposition', 'attachment; filename="summary.pdf"');
        }

        

        return $invoiceResource;

        // return response()->json($data, 200);
    }


    public function update(InvoiceRequest $request,  $id): JsonResponse
    {
        $data = Invoice::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Invoice no encontrado'
            ]);
        }

        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        Invoice::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }

    public function findByCompany(Request $request): JsonResource
    {
        $companyId = $request->input('company_id');
        if (!$companyId) {
            return response()->json([
                'success' => false,
                'message' => 'Debe proporcionar company_id en la solicitud'
            ], 400);
        }
        $data = Invoice::with(['plan.feature', 'document_type', 'state_fee.structure', 'state_fee.state.benefist', 'company.termination', 'bonus'])
            ->where('company_id', $companyId)
            ->get();

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró ningún StateFee con los criterios proporcionados'
            ], 404);
        }

        return InvoiceResoruce::collection($data);

        return response()->json($data, 200);
    }

    public function pdf(Request $request)
    {

        $invoiceId = $request->input('invoice_Id');
        if (!$invoiceId) {
            return response()->json([
                'success' => false,
                'message' => 'Debe proporcionar el id en la solicitud'
            ], 400);
        }

        $invoice = Invoice::with(['plan.feature', 'document_type', 'state_fee.structure', 'state_fee.state.benefist', 'company.termination', 'bonus'])->find($invoiceId);
        // dd(compact('invoice'));


        if (!$invoice) {
            return new JsonResource([
                'success' => true,
                'message' => 'Invoice no encontrado'
            ]);
        }

        $data = new InvoiceResoruce($invoice);
        $data = json_decode($data->toJson(), true);

        // return view('summary.pdf',compact('data'));



        // Render the 'pdf.example' view with the data
        $pdf = pdf::loadView('summary.pdf', compact('data'));
        // return $pdf->stream('pdf.summary');
        // Configura la respuesta HTTP
        $response = new Response($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="summary.pdf"');

        return $response;

        // Download the PDF with a specific file name
        //  return $pdf->download('example.pdf');
    }
}
