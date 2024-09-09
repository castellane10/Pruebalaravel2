<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class requestController extends Controller
{
    public function index() 
    {
        $requests = Requests::all();
        
        if($requests->isEmpty()){
            return response()->json(['message' => 'No hay requests'], 404);
        }

        return response()->json($requests, 200);
    }


    public function store(Request $requestInstance)
    {
        $validator = Validator::make($requestInstance->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        if($validator->fails()){
            $data =[ 
                'message' => 'Error al validar',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $requests = Requests::create([
            'titulo' => $requestInstance->titulo,
            'descripcion' => $requestInstance->descripcion,
            'estado' => $requestInstance->estado
        ]);

        if(!$requests){
            return response()->json(['message' => 'Error al obtener requests'], 500);
        };

         $data = [
            'requests' => $requests,
            'status' => 201
        ];
        return response()->json($data, 201);
       
    }
}
