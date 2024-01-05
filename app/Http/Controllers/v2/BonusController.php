<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\v2\BonusRequest;
use App\Models\Bonus;
use Illuminate\Http\JsonResponse;

class BonusController extends Controller
{
    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        // return response()->json(Feature::all(),200);
        $features = Bonus::where('bonusStatus', true)->get();

        return response()->json($features, 200);
    }


    public function store(BonusRequest $request): JsonResponse
    {
        $data = Bonus::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = Bonus::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Bonus no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(BonusRequest $request,  $id): JsonResponse
    {
        $data = Bonus::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Feature no encontrado'
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
        Bonus::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
