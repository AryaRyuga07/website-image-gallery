<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreProfileController extends Controller
{
    public function exploreProfile(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        $username = $request->acc;
        $userSearch = User::query()->where('username', '=', $username)->first();
        $like = DB::table('photos')
            ->join('likes', 'likes.photo_id', '=', 'photos.id')
            ->where('photos.user_id', $userSearch->id)
            ->count();
        $photos = Photos::query()->where('user_id', '=', $userSearch->id)->get();
        return view('pages.user.explore-profile', [
            'user' => $user,
            'userSearch' => $userSearch,
            'like' => $like,
            'photos' => $photos,
        ]);
    }

    function profilePhotos(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        $username = $request->acc;
        $userSearch = User::query()->where('username', '=', $username)->first();
        $photos = Photos::query()->where('user_id', '=', $userSearch->id)->get();
        $like = DB::table('photos')
            ->join('likes', 'likes.photo_id', '=', 'photos.id')
            ->where('photos.user_id', $userSearch->id)
            ->count();
        return view('pages.user.explore-profile-photos', [
            'user' => $user,
            'userSearch' => $userSearch,
            'like' => $like,
            'photos' => $photos,
        ]);
    }

    function profileFavorite(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        $username = $request->acc;
        $userSearch = User::query()->where('username', '=', $username)->first();
        $photos = Photos::query()->where('user_id', '=', $userSearch->id)->get();
        $like = DB::table('photos')
            ->join('likes', 'likes.photo_id', '=', 'photos.id')
            ->where('photos.user_id', $userSearch->id)
            ->count();
        return view('pages.user.explore-profile-favorite', [
            'user' => $user,
            'userSearch' => $userSearch,
            'like' => $like,
            'photos' => $photos,
        ]);
    }

    function profileAlbum(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        $username = $request->acc;
        $userSearch = User::query()->where('username', '=', $username)->first();
        $album = Album::query()->where('user_id', '=', $userSearch->id)->get();
        $like = DB::table('photos')
            ->join('likes', 'likes.photo_id', '=', 'photos.id')
            ->where('photos.user_id', $userSearch->id)
            ->count();
        $photos = Photos::query()->where('user_id', '=', $userSearch->id)->latest();
        $latestData = Photos::latest()->limit(7)->where('user_id', '=', $userSearch->id)->get();
        return view('pages.user.explore-profile-album', [
            'user' => $user,
            'userSearch' => $userSearch,
            'album' => $album,
            'latest' => $latestData,
            'like' => $like,
            'photos' => $photos,
        ]);
    }
}
