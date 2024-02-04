<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Draft;
use App\Models\Like;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
  function profile(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $like = Like::query()->where('user_id', '=', $user->id)->get();
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile', [
      'user' => $user,
      'like' => $like,
      'photos' => $photos,
    ]);
  }

  function profilePhotos(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    $like = Like::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-photos', [
      'user' => $user,
      'photos' => $photos,
      'like' => $like,
    ]);
  }

  function profileFavorite(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    $like = Like::query()->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-favorite', [
      'user' => $user,
      'photos' => $photos,
      'like' => $like,
    ]);
  }

  function profileAlbum(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $album = Album::query()->where('user_id', '=', $user->id)->get();
    $like = Like::query()->where('user_id', '=', $user->id)->get();
    $photos = Photos::query()->where('user_id', '=', $user->id)->get();
    $latestData = Photos::latest()->limit(7)->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-album', [
      'user' => $user,
      'album' => $album,
      'latest' => $latestData,
      'like' => $like,
      'photos' => $photos,
    ]);
  }

  function addAlbum(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.add-album', [
      'user' => $user
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
    $draft = Draft::query()->where('user_id', '=', $user->id)->get();
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
