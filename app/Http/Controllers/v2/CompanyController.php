<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\v2\CompanyRequest as V2CompanyRequest;
use App\Http\Requests\v2\CompanyStatusRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Termination;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyController extends Controller
{
    // public function index():JsonResponse
    public function index(): JsonResource
    {
        $companies = Company::with(['termination', 'field', 'status'])->get();

        // return response()->json( $companies,200);

        // Utiliza CompanyResource para dar formato a la respuesta JSON
        return CompanyResource::collection($companies);
        //  return response()->json(Company::with(['termination'])->get(),200);
        //return response()->json(Company::all(),200);

    }


    public function store(V2CompanyRequest $request): JsonResponse
    {
        $terminationName = $request->input('terminationName');
        $businessAreaid = $request->input('businessArea');
        $field = $request->input('field') ?? $businessAreaid;
        $userEmail = $request->input('emailAddress');


        $termination = Termination::where('terminationName', $terminationName)->first();
        // dd($termination);
        if (!$termination ) {
            return response()->json([
                'success' => false,
                'message' => 'faltan datos'
            ], 404);
        }

        $user = User::where('email', $userEmail)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'usuario no encontrado'
            ], 404);
        }

        $terminationId = $termination->id;
        //  dd($user['id']);
        $request->merge(['termination_id' => $terminationId]);
        $request->merge(['field_id' => $field]);
        $request->merge(['user_id' => $user['id']]);

        //dd($request);

        $data = Company::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function findByEmail(Request $request): JsonResponse
    {
        $email = $request->input('email');
        if (!$email) {
            return response()->json([
                'success' => false,
                'message' => 'Debe proporcionar el email en la solicitud'
            ], 400);
        }
        $company = Company::with(['termination', 'field', 'status'])
            ->where('emailAddress', $email)
            ->get();

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró ningún compañia con los criterios proporcionados'
            ], 404);
        }

        return response()->json($company, 200);
    }


    public function show($id): JsonResponse
    {
        $company = Company::with(['termination', 'field', 'status'])->find($id);

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Empresa no encontrada'
            ], 200); // Cambié 200 a 404 porque es más apropiado para recursos no encontrados
        }

        $data = new CompanyResource($company);

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }


    public function update(V2CompanyRequest $request,  $id): JsonResponse
    {
        $data = Company::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Company no encontrado'
            ]);
        }

        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return response()->json([
            'success' => true
        ], 200);
    }


    public function statusUpdate(CompanyStatusRequest $request,  $id): JsonResponse
    {
        $data = Company::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Company no encontrado'
            ]);
        }

        $data->status_id = $request->status_id;

        $data->save();

        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        Company::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
