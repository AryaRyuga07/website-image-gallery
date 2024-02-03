<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Draft;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
  function profile(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.profile', [
      'user' => $user
    ]);
  }

  function profilePhotos(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-photos', [
      'user' => $user,
      'photos' => $photos,
    ]);
  }

  function profileFavorite(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-favorite', [
      'user' => $user,
      'photos' => $photos,
    ]);
  }

  function profileAlbum(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $album = Album::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-album', [
      'user' => $user,
      'album' => $album,
    ]);
  }

  function home(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.home', [
      'user' => $user
    ]);
  }
  function explore(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::all();
    return view('pages.user.explore', [
      'user' => $user,
      'photos' => $photos,
    ]);
  }
  function creation(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $draft = Draft::all();
    $album = Album::all();
    return view('pages.user.creation', [
      'user' => $user,
      'draft' => $draft,
      'album' => $album,
    ]);
  }

  function updateProfile(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.update-profile', [
      'user' => $user
    ]);
  }
  function updateAccount(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.update-account', [
      'user' => $user
    ]);
  }
  function deleteAccount(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.delete-account', [
      'user' => $user
    ]);
  }
}
