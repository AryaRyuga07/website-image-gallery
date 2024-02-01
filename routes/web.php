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

// Route::prefix('/auth')->group(function () {
//     Route::get('/login', function () {
//         return view('pages.auth.login');
//     });
//     Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

//     Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
//     Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
// });

Route::prefix('/auth')->group(function() {
	Route::get('/login', function() {
		return view('pages.auth.login');
	});
	Route::get('/register', function() {
		return view('pages.auth.register');
	});
	Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
	Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

	Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
	Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::prefix('/')->middleware([\App\Http\Middleware\Authenticate::class])->group(function() {
	Route::get('/', function () {
		return view('pages.user.home');
	});
	
	Route::get('/explore', function () {
		return view('pages.user.explore');
	});
	
	Route::get('/profile', function () {
		return view('pages.user.profile');
	});
	
	Route::get('/update-profile', function () {
		return view('pages.user.update-profile');
	});
	
	Route::get('/creation', function () {
		return view('pages.user.creation');
	});
	
	Route::get('test', function(){
		return view('pages.user.test');
	});
});