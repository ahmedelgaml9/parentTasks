<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});


Route::group(['prefix'=>'v1'],function(){

  Route::get('users', [UserController::class ,'index']);


});
