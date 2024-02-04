<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;

class ExploreImageController extends Controller
{
    function exploreDetail(Request $request)
    {
        $idImages = $request->json()->all();
        $photos = Photos::query()->where('id', '=', $idImages)->first();
        $url = strtolower(str_replace(" ", "-", $photos->title));
        // return view('pages.user.explore-image', [
        //     'user' => $user,
        //     'photos' => $photos,
        // ]);
        return response()->json(['success' => true, 'url' => $url, 'id' => $idImages]);
    }

    function exploreImage(Request $request)
    {
        $url = $request->segment(2);
        $title = ucwords(strtolower(str_replace("-", " ", $url)));
        $user = User::query()->find($request->user()->getUserId());
        $PhotoUser = Photos::join('user', 'photos.user_id', '=', 'user.id')->select('photos.*', 'user.username', 'user.file_location AS user_photo', 'user.full_name')->get();
        $photos = Photos::all();
        $photoDetail = $PhotoUser->where('title', '=', $title)->first();
        $comment = Comment::join('user', 'comments.user_id', '=', 'user.id')->select('comments.*', 'user.username', 'user.file_location AS user_photo', 'user.full_name')->get();
        $commentPhoto = $comment->where('photo_id', '=', $photoDetail->id);
        $like = Like::all();
        $liked = $like->where('photo_id', '=', $photoDetail->id);
        $likedUser = $liked->where('user_id', '=', $user->id);


        return view('pages.user.explore-image', [
            'user' => $user,
            'photos' => $photos,
            'photoDetail' => $photoDetail,
            'comment' => $commentPhoto,
            'like' => $liked,
            'likedUser' => $likedUser,
        ]);
    }
}
