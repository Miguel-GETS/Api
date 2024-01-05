<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StructureRequest;
use App\Http\Requests\v2\StructureRequest as V2StructureRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\StructureResource;
use App\Models\Structure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StructureController extends Controller
{
    
    public function index():JsonResource
   {
    //    return response()->json(Structure::all(),200);
       return StructureResource::collection(Structure::all());

   }

   public function store(V2StructureRequest $request):JsonResponse
   {
       $data = Structure::create($request-> all());
       return response()->json([
           'success' => true,
           'data' => $data
       ],201);
   }

   
   public function show( $id):JsonResource
   {
       $data = Structure::find($id);

       if(!$data){
           return response()->json([
               'success' => true,
               'message' => 'Structure no encontrado'
           ]);
       }
       return new StructureResource($data);

       return response()->json($data,200);
   }


  
   public function update(V2StructureRequest $request, $id):JsonResponse
   {
       $data = Structure::find($id);
       if(!$data){
           return response()->json([
               'success' => true,
               'message' => 'Structure no encontrado' 
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
       Structure::find($id)->delete();
       return response()->json([
           'success' => true
       ], 200);
   }
}
