<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\v2\FieldRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Field;


class FieldController extends Controller
{
    
    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        return response()->json(Field::all(),200);
        // $features = Field::all();

        // return response()->json($features, 200);
    }


    public function store(FieldRequest $request): JsonResponse
    {
        $data = Field::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = Field::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Field no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(FieldRequest $request,  $id): JsonResponse
    {
        $data = Field::find($id);
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
        Field::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
