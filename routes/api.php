<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\BioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//   api doamin----https://herokudeploynew.herokuapp.com/
// {
//     "fullname": "noman",
//     "email": "hridoy@aol.com",
//     "password": "rama6879",
//     "gender":"male",
//     "birth_date":"2022-05-23"
//  }


Route::fallback(function () {
    return response()->json("Route does not match");
});


Route::post('/signup',[SignupController::class,'store']);

Route::post('/bio',[BioController::class,'store'])->middleware('auth:sanctum');

Route::post('/login',[SignupController::class,'login']);

Route::get('/test',[SignupController::class,'index']);

Route::delete('/detete/{id}',[SignupController::class,'detete'])->middleware('auth:sanctum');

Route::put('/update/{id}',[SignupController::class,'update'])->middleware('auth:sanctum');

Route::delete('/bio/detete/{id}',[BioController::class,'detete'])->middleware('auth:sanctum');

Route::put('/bio/update/{id}',[BioController::class,'update'])->middleware('auth:sanctum');

Route::get('/middle',[SignupController::class,'test'])->middleware('check');

Route::get('/allUsers',[SignupController::class,'usersAll'])->middleware('auth:sanctum');

Route::get('/allBios',[SignupController::class,'biosAll'])->middleware('auth:sanctum');


