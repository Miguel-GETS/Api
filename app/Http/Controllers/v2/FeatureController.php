<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Http\Requests\v2\FeatureRequest as V2FeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureController extends Controller
{

    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        // return response()->json(Feature::all(),200);
        $features = Feature::where('featureStatus', true)->get();

        return response()->json($features, 200);
    }


    public function store(V2FeatureRequest $request): JsonResponse
    {
        $data = Feature::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = Feature::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Feature no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(V2FeatureRequest $request,  $id): JsonResponse
    {
        $data = Feature::find($id);
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
        Feature::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
