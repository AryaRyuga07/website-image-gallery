<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    function draftUpload(Request $request)
    {
        try {
            $images = $request->file('images');
            // dd($images);
            $uploadedImages = [];
            $user = User::query()->find($request->user()->getUserId());

            foreach ($images as $image) {
                $imageModel = new Draft();
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/image/draft'), $imageName);
                $imageModel->file_location = $imageName;
                $imageModel->user_id = $user->id;
                $imageModel->save();

                $uploadedImages[] = $imageName;
            }
            return response()->json(['success' => true, 'image' => $imageName]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    function postImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'album' => 'required',
        ]);

        $image = $request->post('image');
        $title = $request->post('title');
        $description = $request->post('description');
        $album = $request->post('album');
        $user = User::query()->find($request->user()->getUserId());

        $photo = new Photos();
        $photo->title = $title;
        $photo->description = $description;
        $photo->file_location = $image;
        $photo->album_id = $album;
        $photo->user_id = $user->id;
        $photo->save();

        $request->session()->flash('success', 'Post Photos Success!!!');

        $draft = Draft::query()->where('file_location', '=', $image);
        $draft->delete();
        
        return Redirect::back();
    }
}
