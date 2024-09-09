<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{
    public function index() 
    {
        $user = User::all();
        
        if($user->isEmpty()){
            return response()->json(['message' => 'No hay usuarios'], 404);
        }

        return response()->json($user, 200);
    }
}
