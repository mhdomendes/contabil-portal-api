<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::put('/companies/{id}', [CompanyController::class, 'update']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

});