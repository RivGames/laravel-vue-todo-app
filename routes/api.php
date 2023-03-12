<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\TodoController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todos', 'store');
    Route::get('todos/{id}', 'show');
    Route::put('todos/{id}', 'update');
    Route::delete('todos/{id}', 'destroy');
});
