<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('pages.about');
});
// Route::get('/welcome', function () {
//     return view('pages.about');
// });


Route::get('/app', function () {
    return view('layouts.app');
});
