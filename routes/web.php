<?php

use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
//use CategoryController;

Auth::routes();


Route::get('/', function () {
    return view('website.home');
})-> name('website');
Route::get('/about', function () {
    return view('website.about');
});

Route::get('/contract', function () {
    return view('website.contract');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});


Route:: group(['prefix'=> 'admin', 'midleware' => ['auth']], function(){
    Route::get('/dashboard', function(){

        return view('admin.dashboard.index');
    });

    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');

});




        




  




