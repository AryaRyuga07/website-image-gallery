<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Draft;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
                $image->storeAs('public/post', $imageName);
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
        $selectedItem = explode(',', $request->input('selected_ids_post'));
        $album = $request->post('album');
        $user = User::query()->find($request->user()->getUserId());
        $fullname = str_replace('-', ' ', $user->full_name);
        $photos = Photos::query()->latest()->first();
        if ($photos === null) {
            $num = 0;
        } else {
            $num = $photos->id;
        }
        if (count($selectedItem) > 1) {
            for ($i = 0; $i < count($selectedItem); $i++) {
                $data = Draft::where('id', $selectedItem[$i])->first();
                if ($data) {
                    $photo = new Photos();
                    $photo->title = "Gambar " . $num++ . " " . $fullname;
                    $photo->file_location = $data->file_location;
                    $photo->album_id = $album;
                    $photo->user_id = $user->id;
                    $photo->save();
                    Draft::where('id', $selectedItem[$i])->delete();
                }
            }
            return redirect()->back()->with('success', 'Data terpilih berhasil dihapus');
        }

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

        foreach ($arr as $draftId) {
            $draft = Draft::find($draftId);
            if ($draft) {
                // Hapus file dari storage
                $filePath = storage_path('app/public/image/' . $draft->file_location);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                // Hapus data dari database
                $draft->delete();
            }
        }
        return redirect()->back()->with('success', 'Data terpilih berhasil dihapus');
    }

    public function download($id)
    {
        $image = Photos::findOrFail($id);

        $path = storage_path('app/public/post/' . $image->file_location);

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            abort(404, 'File not found');
        }
    }

    public function delete($id)
    {
        $image = Photos::findOrFail($id);
        Storage::delete('public/post/' . $image->file_location);
        $image->delete();
        return redirect()->back();
    }

    public function addAlbum(Request $request)
    {
        $name = $request->post('album');
        $desc = $request->post('description');
        $user = User::query()->find($request->user()->getUserId());
        $album = new Album();
        $album->album_name = $name;
        $album->user_id = $user->id;
        $album->description = $desc;
        $album->save();
        return redirect('/profile/album');
    }

    public function deleteAlbum(Request $request, $id)
    {
        $user = User::query()->find($request->user()->getUserId());
        $album = Album::where('id', '=', $id)->where('user_id', '=', $user->id)->get()[0];
        $image = Photos::query()->where('album_id', '=', $album->id)->get();
        for ($i = 0; $i < $image->count(); $i++) {
            Storage::delete('public/post/' . $image[$i]->file_location);
        }
        $album->delete();
        return redirect()->back();
    }
}
