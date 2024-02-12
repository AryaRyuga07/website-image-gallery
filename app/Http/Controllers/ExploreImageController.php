<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreImageController extends Controller
{
    function exploreDetail(Request $request)
    {
        $idImages = $request->json()->all();
        $photos = Photos::query()->where('id', '=', $idImages)->first();
        $url = strtolower(str_replace(" ", "-", $photos->title));
        return response()->json(['success' => true, 'url' => $url, 'id' => $idImages]);
    }

    function exploreImage(Request $request)
    {
        $url = $request->segment(2);
        $title = ucwords(strtolower(str_replace("-", " ", $url)));

        $user = User::query()->find($request->user()->getUserId());
        $photoUser = Photos::join('user', 'photos.user_id', '=', 'user.id')
            ->select('photos.*', 'user.username', 'user.file_location AS user_photo', 'user.full_name')
            ->get();

        $photos = Photos::all();
        $photoDetail = $photoUser->where('title', '=', $title)->first();

        $comment = Comment::join('user', 'comments.user_id', '=', 'user.id')
            ->select('comments.*', 'user.username', 'user.file_location AS user_photo', 'user.full_name')
            ->get();

        $commentPhoto = $comment->where('photo_id', '=', $photoDetail->id);

        $like = Like::all();
        $liked = $like->where('photo_id', '=', $photoDetail->id);
        $likedUser = $liked->where('user_id', '=', $user->id);

        $result = Photos::select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
            ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
            ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
            ->orderByDesc('photos.id')
            ->get();

        $responseData = [
            'user' => $user,
            'photos' => $photos,
            'photoDetail' => $photoDetail,
            'comment' => $commentPhoto,
            'like' => $liked,
            'likedUser' => $likedUser,
            'result' => $result,
        ];

        // Check if the request expects JSON
        if ($request->expectsJson()) {
            return response()->json($responseData);
        }

        // Return the view along with data
        return view('pages.user.explore-image', $responseData);
    }

    public function search(Request $request)
    {
        // $search = $request->input('q');
        // $user = User::query()->find($request->user()->getUserId());
        // $photos = Photos::query()->where('title', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->get();
        // $like = Like::all();
        // $result = Photos::select('photos.id', 'photos.title', 'photos.file_location', DB::raw('COALESCE(likes_count, 0) as likeTotal'), DB::raw('COALESCE(comment_count, 0) as commentTotal'))
        // ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as likes_count FROM likes GROUP BY photo_id) as likes'), 'likes.photo_id', '=', 'photos.id')
        // ->leftJoin(DB::raw('(SELECT photo_id, COUNT(id) as comment_count FROM comments GROUP BY photo_id) as comments'), 'comments.photo_id', '=', 'photos.id')
        // ->orderByDesc('photos.id')
        // ->get();
        // return view('pages.user.explore', [
        //     'user' => $user,
        //     'photos' => $photos,
        //     'like' => $like,
        //     'result' => $result,
        // ]);
    }
}
