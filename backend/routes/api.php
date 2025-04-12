<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::post("signup", [AuthController::class, "signup"]);
Route::post("signin", [AuthController:: class, "signin"]);

Route::group([

    "middleware" => ["auth:sanctum"]

], function(){

    Route::get("profile", [AuthController::class, "profile"]);
    Route::get("logout", [AuthController::class, "logout"]);

    //Passed
    Route::apiResource("products", ProductController::class);



}); 





// Route::get('/user', function (Request $request) { 
//     return $request->user();
// })->middleware('auth:sanctum');
