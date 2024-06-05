<?php

use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/classroom/list',[ClassroomController::class,'index']);
Route::get('/classroom/show',[ClassroomController::class,'show']);
Route::post('/classroom/create',[ClassroomController::class,'store']);
Route::put('/classroom/update/{id}',[ClassroomController::class,'update']);
Route::delete('/classroom/update/{id}',[ClassroomController::class,'destroy']);

Route::get('/student/list',[StudentController::class,'index']);
Route::get('/student/show',[StudentController::class,'show']);
Route::post('/student/create',[StudentController::class,'store']);
Route::put('/student/update/{id}',[StudentController::class,'update']);
Route::delete('/student/update/{id}',[StudentController::class,'destroy']);