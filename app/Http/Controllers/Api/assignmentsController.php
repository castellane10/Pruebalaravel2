<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignments;
use Illuminate\Support\Facades\Validator;

class assignmentsController extends Controller
{
    public function index() 
    {
        $assignments = Assignments::all();
        
        if($assignments->isEmpty()){
            return response()->json(['message' => 'No hay assignments'], 404);
        }
        return response()->json($assignments, 200);
    }

   public function store(Request $requestInstance)
    {
        $validator = Validator::make($requestInstance->all(), [
            'request' => 'required|exists:requests,id',  
            'usuario' => 'required|exists:user,id',    
            'assign_method' => 'required|string'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error al validar',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $assignment = Assignments::create([
            'request' => $requestInstance->input('request'),      
            'usuario' => $requestInstance->input('usuario'),      
            'assign_method' => $requestInstance->input('assign_method') 
        ]);

        if (!$assignment) {
            return response()->json(['message' => 'Error al crear la asignación'], 500);
        }

        $data = [
            'assignment' => $assignment,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $assignments = Assignments::find($id);

        if(!$assignments){
            return response()->json(['message' => 'Assignment no econtrado'], 404);
        }
        return response()->json($assignments, 200);
    }


}
