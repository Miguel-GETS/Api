<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\BenefistRequest;
use App\Http\Requests\v2\BenefistRequest as V2BenefistRequest;
use App\Models\Benefist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BenefistController extends Controller
{
    public function index():JsonResponse
    {
        // return response()->json(Benefist::all(),200);
        $benefist = Benefist::where('benefistStatus', true)->get();

        return response()->json($benefist, 200);
    }


    public function store(V2BenefistRequest $request):JsonResponse
    {
        $data = Benefist::create($request-> all());
        return response()->json([
            'success' => true,
            'data' => $data
        ],201);
    }


    public function show( $id):JsonResponse
    {
        $data = Benefist::find($id);

        if(!$data){
            return response()->json([
                'success' => true,
                'message' => 'Benefist no encontrado'
            ]);
        }
        return response()->json($data,200);
    }

   
    public function update(V2BenefistRequest $request,  $id):JsonResponse
    {
        $data = Benefist::find($id);
        if(!$data){
            return response()->json([
                'success' => true,
                'message' => 'Benefist no encontrado' 
            ]);
        }

        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy( $id):JsonResponse
    {
        Benefist::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
