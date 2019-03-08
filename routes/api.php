<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pokemon',function(){
    $pokemon = DB::table('pokemon')->simplePaginate(20);
    return $pokemon;
});

Route::get('/pokemon/{id}',function($id){
    $pokemon = DB::table('pokemon')->find($id);
    dd($pokemon);
});
