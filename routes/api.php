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
    $pokemon = DB::table('pokemon')->where('pokemon.id','=',$id)->get();
    return $pokemon;
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::get('/testuserpokemon',function(){
    $userpokemon = DB::table('userpokemon')->join('pokemon','pokemon.id','=','userpokemon.id')->where('userpokemon.userid','=','1')->select('pokemon.*')->get();
    return $userpokemon;
});

Route::middleware('auth:api')->get('userpokemon',function(Request $request){
    $userid = $request->user()->id;
    $userpokemon = DB::table('userpokemon')->join('pokemon','pokemon.id','=','userpokemon.pokemonid')->where('userpokemon.userid','=',$userid)->select('pokemon.*')->get();
    return $userpokemon;
});

Route::middleware('auth:api')->post('useraddpokemon',function(Request $request){
    $userid = $request->user()->id;
    $pokemonid = $request->pokemonid;
    $id = DB::table('userpokemon')->insertGetId(['userid' => $userid, 'pokemonid' => $pokemonid]);
    return $id;
});


