<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\BioController;
use App\Http\Middleware\checkuser;

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

Route::fallback(function () {
    return response()->json("Route does not match");
});

Route::post('/bio',[BioController::class,'store']);
Route::post('/signup',[SignupController::class,'store']);
Route::post('/login',[SignupController::class,'login']);
Route::get('/test',[SignupController::class,'index']);
Route::get('/middle',[SignupController::class,'check'])->middleware([checkuser::class]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
