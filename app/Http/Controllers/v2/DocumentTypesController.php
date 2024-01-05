<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\v2\DocumentTypesRequest;
use App\Models\DocumentType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{
    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        // return response()->json(Feature::all(),200);
        $features = DocumentType::get();

        return response()->json($features, 200);
    }


    public function store(DocumentTypesRequest $request): JsonResponse
    {
        $data = DocumentType::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = DocumentType::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'DocumentType no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(DocumentTypesRequest $request,  $id): JsonResponse
    {
        $data = DocumentType::find($id);
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
        DocumentType::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
