<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class managementProfileController extends Controller
{
    function updateProfile(Request $req) {
        $userId = $req->user()->getUserId();
    
        $firstname = $req->post('firstname');
        $lastname = $req->post('lastname');
        $fullname = $firstname . '-' . $lastname;
        $address = $req->post('address');
        
        if($fullname === null) {
            $fullname = null;
        }
        if($address == null) {
            $address == null;
        }

        
        $image = $req->file('image');
        
        if($image != null) {
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('assets/image'), $imageName);
            User::where('id', $userId)->update(['file_location' => $imageName, 'full_name' => $fullname, 'address' => $address]);
            return redirect('/profile');
        }
        
        // Simpan informasi gambar ke dalam database
        User::where('id', $userId)->update(['full_name' => $fullname, 'address' => $address]);
        return redirect('/profile');
    }

    function updateAccount(Request $request) 
    {
        $user = User::query()->find($request->user()->getUserId());
        $userId = $request->user()->getUserId();
        $username = $request->post('username');
		$password = $request->post('password');

        if($password == null) {
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
        User::where('id', $userId)->delete();
        $request->session()->flash('login_error', 'Delete Data Success');
        return response()->view('pages.auth.login', [], 401);
    }
}
