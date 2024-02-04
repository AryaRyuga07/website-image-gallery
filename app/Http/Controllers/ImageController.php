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
        $titleReplace = ucwords(preg_replace('/[^a-zA-Z0-9]/', ' ', $title));
        $description = $request->post('description');
        $album = $request->post('album');
        $user = User::query()->find($request->user()->getUserId());

        $photo = new Photos();
        $photo->title = $titleReplace;
        $photo->description = $description;
        $photo->file_location = $image;
        $photo->album_id = $album;
        $photo->user_id = $user->id;
        $photo->save();

        $request->session()->flash('success', 'Post Photos Success!!!');

        $draft = Draft::query()->where('file_location', '=', $image)->where('user_id', '=', $user->id);
        $draft->delete();

        return Redirect::back();
    }

    public function deleteDraft(Request $request)
    {
        $selectedItems = $request->input('selected_ids');
        $arr = explode(",", $selectedItems);

        for ($i = 0; $i < count($arr); $i++) {
            Draft::where('id', $arr[$i])->delete();
        }
        return redirect()->back()->with('success', 'Data terpilih berhasil dihapus');
    }
}
