<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/requests', function () {
    return view('requests');
});
Route::get('/requests/create', function () {
    return view('request_create');
});
Route::get('/assignments', function () {
    return view('assignments');
});
Route::get('/assignments/create', function () {
    return view('assignments_create');
});

