<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\requestController;
use App\Http\Controllers\Api\assignmentsController;
use App\Http\Controllers\Api\userController;

Route::get('/requests', [requestController::class, 'index']);
Route::post('/requests', [requestController::class, 'store']);

Route::get('/user', [userController::class, 'index']);

Route::get('/assignments', [assignmentsController::class, 'index']);
Route::post('/assignments', [assignmentsController::class, 'store']);
Route::get('/assignments/{id}/requests', [assignmentsController::class, 'show']);