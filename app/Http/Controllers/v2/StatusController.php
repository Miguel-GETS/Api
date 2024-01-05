<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //public function index():JsonResponse
    public function index(): JsonResponse
    {
        return response()->json(Status::all(),200);
    }


    public function store(StatusRequest $request): JsonResponse
    {
        $data = Status::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $data = Status::find($id);

        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Status no encontrado'
            ]);
        }
        return response()->json($data, 200);
    }


    public function update(StatusRequest $request,  $id): JsonResponse
    {
        $data = Status::find($id);
        if (!$data) {
            return response()->json([
                'success' => true,
                'message' => 'Status no encontrado'
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
        Status::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
