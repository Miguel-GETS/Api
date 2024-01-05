<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolRequest;
use App\Models\Rol;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RolController extends Controller
{
    
    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        return response()->json(Rol::all(),200);
    }


    public function store(RolRequest $request): JsonResponse
    {
        $data = Rol::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = Rol::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Field no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(RolRequest $request,  $id): JsonResponse
    {
        $data = Rol::find($id);
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
        Rol::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
