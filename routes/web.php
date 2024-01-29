<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.user.home');
});

Route::get('/explore', function () {
    return view('pages.user.explore');
});

Route::get('/profile', function () {
    return view('pages.user.profile');
});

Route::get('/creation', function () {
    return view('pages.user.creation');
});