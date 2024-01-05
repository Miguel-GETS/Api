<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\v2\PlanRequest as V2PlanRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanController extends Controller
{
    //public function index():JsonResponse
    
     public function index():JsonResource
    {
        // return response()->json(Plan::with('feature')->get(),200);
        //return response()->json(Plan::with('feature')->get(), 200);
        return PlanResource::collection(Plan::with('feature')->get());
        
        // $plan = Plan::where('planStatus', true)->get();

        // return response()->json($plan, 200);
    }

    public function store(V2PlanRequest $request):JsonResponse
    {
        $data = Plan::create($request-> all());
        return response()->json([
            'success' => true,
            'data' => $data
        ],201);
    }

    
    public function show( $id):JsonResponse
    {
        $data = Plan::find($id);

        if(!$data){
            return response()->json([
                'success' => true,
                'message' => 'Plan no encontrado'
            ]);
        }
        return response()->json($data,200);
    }


   
    public function update(V2PlanRequest $request, $id):JsonResponse
    {
        $data = Plan::find($id);
        if(!$data){
            return response()->json([
                'success' => true,
                'message' => 'Plan no encontrado' 
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
        Plan::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
