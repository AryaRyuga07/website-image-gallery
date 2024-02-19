<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class managementProfileController extends Controller
{
    function updateProfile(Request $req)
    {
        $userId = $req->user()->getUserId();

        $firstname = $req->post('firstname');
        $lastname = $req->post('lastname');
        $fullname = $firstname . '-' . $lastname;
        $address = $req->post('address');

        if ($fullname === null) {
            $fullname = null;
        }
        if ($address == null) {
            $address == null;
        }

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->extension();
            // Hapus gambar lama jika ada
            $user = User::where('id', $userId)->first();
            if ($user->file_location) {
                Storage::delete('public/image/' . $user->file_location);
            }
            // Simpan gambar baru ke storage
            $image->storeAs('public/image', $imageName);
            // Perbarui informasi pengguna dengan gambar baru
            User::where('id', $userId)->update(['file_location' => $imageName, 'full_name' => $fullname, 'address' => $address]);
        } else {
            // Jika gambar tidak diperbarui, hanya perbarui informasi pengguna
            User::where('id', $userId)->update(['full_name' => $fullname, 'address' => $address]);
        }

        return redirect('/profile');
    }

    function updateAccount(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        $userId = $request->user()->getUserId();
        $username = $request->post('username');
        $password = $request->post('password');

        if ($password == null) {
            User::where('id', $userId)->update(['username' => $username]);
            $request->session()->flash('update_success', 'Username Changed!!');
            return response()->view('pages.user.update-account', ['user' => $user], 401);
        }

        $passwordHash = Hash::make($password);
        User::where('id', $userId)->update(['username' => $username, 'password' => $passwordHash]);
        $request->session()->flash('update_success', 'Username Changed!!');
        return response()->view('pages.user.update-account', ['user' => $user], 401);
    }

    function deleteAccount(Request $request)
    {
        $userId = $request->user()->getUserId();
        $user = User::where('id', $userId)->first();
        Storage::delete('public/image/' . $user->file_location);
        $user->delete();
        $request->session()->invalidate();
		$request->session()->regenerateToken();
        $request->session()->flash('login_error', 'Delete Data Success');
        return response()->view('pages.auth.login', [], 401);
    }
}
