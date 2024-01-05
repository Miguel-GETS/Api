<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Requests\v2\StateRequest as V2StateRequest;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    
    public function index():JsonResponse
   {
       return response()->json(State::all(),200);
   }

   public function store(V2StateRequest $request):JsonResponse
   {
       $data = State::create($request-> all());
       return response()->json([
           'success' => true,
           'data' => $data
       ],201);
   }

   
   public function show( $id):JsonResponse
   {
       $data = State::find($id);

       if(!$data){
           return response()->json([
               'success' => true,
               'message' => 'State no encontrado'
           ]);
       }
       return response()->json($data,200);
   }


  
   public function update(V2StateRequest $request, $id):JsonResponse
   {
       $data = State::find($id);
       if(!$data){
           return response()->json([
               'success' => true,
               'message' => 'State no encontrado' 
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
       State::find($id)->delete();
       return response()->json([
           'success' => true
       ], 200);
   }
}
