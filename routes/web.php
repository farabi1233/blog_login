<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.home');
});
Route::get('/about', function () {
    return view('website.about');
});

Route::get('/contract', function () {
    return view('website.contract');
});

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/post', function () {
    return view('website.post');
});



Route::get('/test', function () {
    return view('admin.dashboard.index');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
