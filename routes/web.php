<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;


// Route::get('/', [HomeController::class, 'index']);
// Route::post('/', [HomeController::class, 'store']);
Route::get('/', [AuthController::class, 'login_get']);
Route::post('/', [AuthController::class, 'login_post']);



Route::middleware(UserMiddleware::class)->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/asset', [AssetController::class, 'index']);
    Route::get('/asset/type/{type_asset}', [AssetController::class, 'typelist']);
    Route::get('/asset/detail/{type_asset}', [AssetController::class, 'detail']);

    Route::middleware(AdminMiddleware::class)->group(function () {

        // Employee
        Route::get('/employee/add', [EmployeeController::class, 'create']);
        Route::post('/employee', [EmployeeController::class, 'store']);
        Route::post('/employee/{id}', [EmployeeController::class, 'destroy']);
        Route::get('/employeedit/{id}', [EmployeeController::class, 'edit']);
        Route::post('/employeedit/{id}', [EmployeeController::class, 'update']);



        // Asset
        Route::get('/asset/add', [AssetController::class, 'create']);
        Route::post('/asset', [AssetController::class, 'store']);
        Route::get('/assetedit/{id}', [AssetController::class, 'edit']);
        Route::post('/assetedit/{id}', [AssetController::class, 'update']);
        Route::post('/asset/{id}', [AssetController::class, 'destroy']);

        // User
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/add', [UserController::class, 'create']);
        Route::post('/user', [UserController::class, 'store']);
        Route::get('/useredit/{id}', [UserController::class, 'edit']);
        Route::post('/useredit/{id}', [UserController::class, 'update']);
        Route::post('/user/{id}', [UserController::class, 'destroy']);

        //detail list dashboard
        Route::get('/asset/{type_asset}', [AssetController::class, 'typelist']); 
        Route::get('/asset/detail/{type_asset}', [AssetController::class, 'detail']); 
        
        // Search
   
    });
});
