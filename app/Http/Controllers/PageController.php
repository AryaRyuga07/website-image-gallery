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
    $albumsPhoto = Album::query()
      ->select(
        'album.*',
        DB::raw('(SELECT file_location FROM photos WHERE photos.album_id = album.id ORDER BY created_at DESC LIMIT 1) AS last_uploaded_image')
      )
      ->where('user_id', $user->id)
      ->get();
    $photos = Photos::query()->where('user_id', '=', $user->id)->latest();

    return view('pages.user.profile-album', [
      'user' => $user,
      'album' => $album,
      'albumsPhoto' => $albumsPhoto,
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
    $userAll = User::all();
    return view('pages.user.home', [
      'user' => $user,
      'photos' => $photos,
      'like' => $like,
      'comment' => $comment,
      'likedUser' => $likedUser,
      'userAll' => $userAll,
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
      'albumDetail' => null,
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
  public function analytics(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    $photos = Photos::query()
      ->select(
        'photos.*',
        'album.album_name',
        DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.photo_id = photos.id) AS likes_count'),
        DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.photo_id = photos.id) AS comments_count')
      )
      ->join('album', 'album.id', '=', 'photos.album_id')
      ->where('photos.user_id', '=', $user->id)
      ->orderByDesc('likes_count')
      ->get();
    $albums = Album::query()
      ->select(
        'album.*',
        DB::raw('(SELECT COUNT(*) FROM likes INNER JOIN photos ON likes.photo_id = photos.id WHERE photos.album_id = album.id) AS likes_count'),
        DB::raw('(SELECT COUNT(*) FROM comments INNER JOIN photos ON comments.photo_id = photos.id WHERE photos.album_id = album.id) AS comments_count'),
        DB::raw('(SELECT file_location FROM photos WHERE photos.album_id = album.id ORDER BY created_at DESC LIMIT 1) AS last_uploaded_image')
      )
      ->where('user_id', $user->id)
      ->orderByDesc('likes_count')
      ->get();
    return view('pages.user.analytics', [
      'user' => $user,
      'photos' => $photos,
      'albums' => $albums,
    ]);
  }

  function test(Request $request)
  {
    $user = User::query()->find($request->user()->getUserId());
    return view('pages.user.test', [
      'user' => $user
    ]);
  }

  public function exploreAlbumPage(Request $request)
  {
    $idImages = $request->json()->all();
    $album = Album::query()->where('id', '=', $idImages)->first();
    $user = User::query()->where('id', '=', $album->user_id)->first();
    $url = strtolower(str_replace(" ", "-", $album->album_name));
    return response()->json(['success' => true, 'url' => $url, 'id' => $idImages, 'user' => $user]);
  }

  public function exploreAlbum(Request $request)
  {
    $url = $request->segment(2);
    $username = $request->segment(3);
    $title = ucwords(strtolower(str_replace("-", " ", $url)));

    $userDetail = User::query()->where('username', '=', $username)->first();
    $user = User::query()->find($request->user()->getUserId());
    $albumUser = Album::join('user', 'album.user_id', '=', 'user.id')
      ->leftJoin('photos', 'photos.album_id', '=', 'album.id')
      ->select('album.*', 'user.username', 'user.file_location AS user_photo', 'user.full_name', 'photos.file_location AS album_photos')
      ->orderByDesc('photos.id')
      ->get();
    $albumDetail = $albumUser->where('album_name', '=', $title)->where('user_id', '=', $userDetail->id)->first();
    $album = Album::query()->where('user_id', '=', $userDetail->id)->get();

    $result = Photos::select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
      ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
      ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
      ->orderByDesc('photos.id')
      ->where('album_id', '=', $albumDetail->id)
      ->get();

    $responseData = [
      'user' => $user,
      'userDetail' => $userDetail,
      'album' => $album,
      'albumDetail' => $albumDetail,
      'result' => $result,
    ];

    // Check if the request expects JSON
    if ($request->expectsJson()) {
      return response()->json($responseData);
    }

    // Return the view along with data
    return view('pages.user.album-image', $responseData);
  }

  function addImageAlbum(Request $request)
  {
    $idImages = $request->json()->all();
    $album = Album::query()->where('id', '=', $idImages)->first();
    $user = User::query()->where('id', '=', $album->user_id)->first();
    $url = strtolower(str_replace(" ", "-", $album->album_name));
    return response()->json(['success' => true, 'url' => $url, 'id' => $idImages, 'user' => $user]);
  }

  function creationWithAlbum(Request $request)
  {
    $url = $request->segment(2);
    $title = ucwords(strtolower(str_replace("-", " ", $url)));

    $user = User::query()->find($request->user()->getUserId());
    $draft = Draft::query()->where('user_id', '=', $user->id)->get();
    $album = Album::query()->where('user_id', '=', $user->id)->get();
    $albumDetail = $album->where('album_name', '=', $title)->first();

    $responseData = [
      'user' => $user,
      'album' => $album,
      'draft' => $draft,
      'albumDetail' => $albumDetail,
    ];

    // Check if the request expects JSON
    if ($request->expectsJson()) {
      return response()->json($responseData);
    }

    // Return the view along with data
    return view('pages.user.creation', $responseData);
  }
}
