<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

use function auth;
use function redirect;
use function response;

class AuthController extends Controller
{
    private AuthService $service;

	public function __construct()
	{
		$this->service = new AuthService();
	}

	public function login(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'required'
		]);

		$username = $request->post('username');
		$password = $request->post('password');

		/** @var User $user */
		$user = User::query()->where('username', '=', $username)->first();
		if ($user === null || !$user->isPasswordValid($password)) {
			$request->session()->flash('login_error', 'Invalid username or password');
			return response()->view('pages.auth.login', [], 401);
		}
		$this->service->set($request, $user);

		// Redirect non-admin users
		return redirect('/');
	}
	
    public function register(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'required',
			'email' => 'required'
		]);

		$username = $request->post('username');
		$password = $request->post('password');
		$email = $request->post('email');

		/** @var User $user */
		$user = User::query()->where('username', '=', $username)->orWhere('email', '=', $email)->first();
		if ($user === null) {
            $service = new AuthService();
            $service->createAccount($username, $password, $email);
			$request->session()->flash('login_error', 'Account Created!!!');
			return response()->view('pages.auth.login', [], 401);
		} else {
			$request->session()->flash('register_error', 'Email/Username Already Used');
			return response()->view('pages.auth.register', [], 401);
        }
	}

	public function logout(Request $request)
	{
		auth()->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/auth/login');
	}
}
