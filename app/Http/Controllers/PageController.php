<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function profile(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        return view('pages.user.profile', [
			'user' => $user
		]);
    }
    
    function home(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        return view('pages.user.home', [
			'user' => $user
		]);
    }
    function explore(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        return view('pages.user.explore', [
			'user' => $user
		]);
    }
    function creation(Request $request)
    {
        $user = User::query()->find($request->user()->getUserId());
        return view('pages.user.creation', [
			'user' => $user
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
}
