<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Draft;
use App\Models\Like;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $photoAlbum = $photos->where('album_id', '=', $album->first()->id)->first();
    $thumbnail = $photoAlbum->latest();
    $albumPhotos = DB::table(DB::raw('(SELECT photos.*, album.album_name, ROW_NUMBER() OVER (PARTITION BY album_id ORDER BY RAND()) as row_num FROM photos LEFT JOIN album ON album.id = photos.album_id WHERE photos.album_id IS NOT NULL) as subquery'))
      ->select('subquery.id', 'subquery.title', 'subquery.file_location', 'subquery.album_name', 'subquery.album_id as albumId')
      ->where('subquery.row_num', '<=', 4)
      ->where('subquery.user_id', '=', 1)
      ->latest()
      ->get();

    $groupedPhotos = $albumPhotos->groupBy('album_name');

    // dd($groupedPhotos);

    $latestData = Photos::latest()->limit(7)->where('user_id', '=', $user->id)->get();
    return view('pages.user.profile-album', [
      'user' => $user,
      'album' => $album,
      'latest' => $latestData,
      'like' => $like,
      'thumbnail' => $thumbnail->first(),
      'photos' => $photos,
      'albumPhotos' => $albumPhotos,
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
    $like = Like::all();
    $result = Photos::select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
      ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
      ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
      ->orderByDesc('photos.id')
      ->get();
    return view('pages.user.explore', [
      'user' => $user,
      'photos' => $photos,
      'like' => $like,
      'result' => $result,
    ]);
  }
  function creation(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $draft = Draft::query()->where('user_id', '=', $user->id)->get();
    $album = Album::query()->where('user_id', '=', $user->id)->get();
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
