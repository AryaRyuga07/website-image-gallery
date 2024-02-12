<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
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
    $like = DB::table('photos')
      ->join('likes', 'likes.photo_id', '=', 'photos.id')
      ->where('photos.user_id', $user->id)
      ->count();
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
    $like = DB::table('photos')
      ->join('likes', 'likes.photo_id', '=', 'photos.id')
      ->where('photos.user_id', $user->id)
      ->count();
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
    $like = DB::table('photos')
      ->join('likes', 'likes.photo_id', '=', 'photos.id')
      ->where('photos.user_id', $user->id)
      ->count();
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
    $like = DB::table('photos')
      ->join('likes', 'likes.photo_id', '=', 'photos.id')
      ->where('photos.user_id', $user->id)
      ->count();
    $photos = Photos::query()->where('user_id', '=', $user->id)->latest();
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
    $photos = Photos::join('user', 'user.id', '=', 'photos.user_id')
      ->select('photos.id as photoId', 'photos.title', 'photos.description', 'photos.file_location', 'photos.created_at', 'user.id', 'user.full_name', 'user.file_location as profile', 'user.username')
      ->get();
    $like = Like::all();
    $likedUser = $like->where('user_id', '=', $user->id);
    $comment = Comment::all();
    return view('pages.user.home', [
      'user' => $user,
      'photos' => $photos,
      'like' => $like,
      'comment' => $comment,
      'likedUser' => $likedUser,
    ]);
  }
  function explore(Request $request)
  {
    $search = $request->input('q');
    $user = User::query()->find($request->user()->getUserId());
    if ($search === null) {
      $photos = Photos::all();
      $result = Photos::select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
        ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
        ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
        ->orderByDesc('photos.id')
        ->get();
    } else {
      $photos = Photos::query()->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
      $result = $photos->select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
        ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
        ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
        ->orderByDesc('photos.id')
        ->get();
    }
    $like = Like::all();
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
