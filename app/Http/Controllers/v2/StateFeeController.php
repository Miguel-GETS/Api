<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateFeeRequest;
use App\Http\Requests\v2\StateFeeRequest as V2StateFeeRequest;
use App\Models\StateFee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateFeeController extends Controller
{

    public function index(): JsonResponse
    {
        //    return response()->json(StateFee::all(),200);
        $stateFee = StateFee::with(['structure', 'state.benefist',])->where('feeStatus', true)->get();

        return response()->json($stateFee, 200);
    }

    public function store(V2StateFeeRequest $request): JsonResponse
    {
        $data = StateFee::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = StateFee::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'StateFee no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }



    public function update(V2StateFeeRequest $request, $id): JsonResponse
    {
        $data = StateFee::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'StateFee no encontrado'
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
        StateFee::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }

    public function findByState(Request $request): JsonResponse
    {
        $stateId = $request->input('state_id');
        if (!$stateId) {
            return response()->json([
                'success' => false,
                'message' => 'Debe proporcionar state_id en la solicitud'
            ], 400);
        }
        $stateFee = StateFee::with(['structure','state'])
            ->where('state_id', $stateId)
            ->where('feeStatus', true)
            ->get();

        if (!$stateFee) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró ningún StateFee con los criterios proporcionados'
            ], 404);
        }

        return response()->json($stateFee, 200);
    }

    public function search(Request $request): JsonResponse
    {
        $stateId = $request->input('state_id');
        $structureId = $request->input('structure_id');

        // Verificar si se proporcionaron ambos valores en la solicitud
        if (!$stateId || !$structureId) {
            return response()->json([
                'success' => false,
                'message' => 'Debe proporcionar state_id y structure_id en la solicitud'
            ], 400);
        }

        // Buscar el StateFee que cumple con los criterios dados
        $stateFee = StateFee::with(['structure', 'state.benefist',])
            ->where('state_id', $stateId)
            ->where('structure_id', $structureId)
            ->where('feeStatus', true)
            ->first();

        if (!$stateFee) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró ningún StateFee con los criterios proporcionados'
            ], 404);
        }

        return response()->json($stateFee, 200);
    }
}
