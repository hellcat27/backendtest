<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokemon',function(){
    $pokemon = DB::table('pokemon')->simplePaginate(20);
    return $pokemon;
});

Route::get('/pokemon/{id}',function($id){
    $pokemon = DB::table('pokemon')->find($id);
    dd($pokemon);
});
