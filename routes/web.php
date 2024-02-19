<?php

use App\Http\Controllers\PageController;
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

Route::middleware('guest')->group(function () {
	Route::prefix('/auth')->group(function () {
		Route::get('/login', function () {
			return view('pages.auth.login');
		});
		Route::get('/register', function () {
			return view('pages.auth.register');
		});
		Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
		Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

		Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
	});
});
Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::prefix('/')->middleware('auth')->group(function () {
	Route::get('/', [\App\Http\Controllers\PageController::class, 'home']);

	Route::get('/explore', [\App\Http\Controllers\PageController::class, 'explore']);
	Route::get('/search', [\App\Http\Controllers\PageController::class, 'explore']);
	Route::post('/explore-image', [\App\Http\Controllers\ExploreImageController::class, 'exploreDetail']);
	Route::get('/explore-image/{subtitle}', [\App\Http\Controllers\ExploreImageController::class, 'exploreImage']);

	Route::post('/update-photo', [\App\Http\Controllers\ImageController::class, 'updatePhoto']);
	Route::post('/update-image', [\App\Http\Controllers\ImageController::class, 'updateImage']);
	Route::get('/update-photo/{subtitle}', [\App\Http\Controllers\ImageController::class, 'editPhoto']);

	Route::post('/update-album-page', [\App\Http\Controllers\ImageController::class, 'updateAlbumPage']);
	Route::post('/update-album', [\App\Http\Controllers\ImageController::class, 'updateAlbum']);
	Route::get('/update-album/{subtitle}', [\App\Http\Controllers\ImageController::class, 'editAlbum']);

	Route::post('/comment', [\App\Http\Controllers\ActionController::class, 'comment']);
	Route::post('/like', [\App\Http\Controllers\ActionController::class, 'like']);
	Route::get('/download/{id}', [\App\Http\Controllers\ImageController::class, 'download']);
	Route::get('/delete/{id}', [\App\Http\Controllers\ImageController::class, 'delete']);
	Route::get('/delete-album/{id}', [\App\Http\Controllers\ImageController::class, 'deleteAlbum']);

	Route::get('/analytics', [\App\Http\Controllers\PageController::class, 'analytics']);
	Route::get('/profile', [\App\Http\Controllers\PageController::class, 'profile']);
	Route::get('/profile/photos', [\App\Http\Controllers\PageController::class, 'profilePhotos']);
	Route::get('/profile/album', [\App\Http\Controllers\PageController::class, 'profileAlbum']);
	// Route::get('/profile/favorite', [\App\Http\Controllers\PageController::class, 'profileFavorite']);

	Route::get('/ex-profile/{acc}', [\App\Http\Controllers\ExploreProfileController::class, 'exploreProfile']);
	Route::get('/ex-profile/photos/{acc}', [\App\Http\Controllers\ExploreProfileController::class, 'profilePhotos']);
	Route::get('/ex-profile/album/{acc}', [\App\Http\Controllers\ExploreProfileController::class, 'profileAlbum']);
	// Route::get('/ex-profile/favorite/{acc}', [\App\Http\Controllers\ExploreProfileController::class, 'profileFavorite']);

	Route::get('/update-profile', [\App\Http\Controllers\PageController::class, 'updateProfile']);
	Route::get('/update-account', [\App\Http\Controllers\PageController::class, 'updateAccount']);
	Route::get('/delete-account', [\App\Http\Controllers\PageController::class, 'deleteAccount']);
	Route::get('/delete-acc', [\App\Http\Controllers\managementProfileController::class, 'deleteAccount']);

	Route::post('/update-profile', [\App\Http\Controllers\managementProfileController::class, 'updateProfile']);
	Route::post('/update-account', [\App\Http\Controllers\managementProfileController::class, 'updateAccount']);
	Route::post('/update-account', [\App\Http\Controllers\managementProfileController::class, 'updateAccount']);
	Route::get('/add-album', [App\Http\Controllers\PageController::class, 'addAlbum']);
	Route::post('/add-album', [App\Http\Controllers\ImageController::class, 'addAlbum']);

	Route::post('/draft', [App\Http\Controllers\ImageController::class, 'draftUpload']);
	Route::post('/delete-draft', [App\Http\Controllers\ImageController::class, 'deleteDraft']);
	Route::post('/post-image', [\App\Http\Controllers\ImageController::class, 'postImage']);

	Route::get('/creation', [\App\Http\Controllers\PageController::class, 'creation']);
	// Route::get('test', [\App\Http\Controllers\PageController::class, 'test']);
});
