<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ActionController extends Controller
{
    function comment(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'photoId' => 'required'
        ]);

        $user = User::query()->find($request->user()->getUserId());
        $commentText = $request->post('comment');
        $photoId = $request->post('photoId');
        if ($user !== null && $photoId !== null) {
            $comment = new Comment();
            $comment->photo_id = $photoId;
            $comment->user_id = $user->id;
            $comment->comment = $commentText;
            $comment->save();
            return Redirect::back();
        }
    }

    function like(Request $request)
    {
        $id = $request->json()->all()[0];
        
        $user = User::query()->find($request->user()->getUserId());
        $data = Like::query()->where('photo_id', '=', $id)->where('user_id', '=', $user->id)->get();
        // return response()->json(['message' => count($data)]);
        
        if (count($data) !== 0) {
            Like::where('photo_id', '=',  $id)->where('user_id', '=', $user->id)->delete();
            return response()->json(['message' => 'Data deleted']);
        } else {
            $like = new Like();
            $like->photo_id = $id;
            $like->user_id = $user->id;
            $like->save();
            return response()->json(['message' => 'Data added']);
        }
    }
}
