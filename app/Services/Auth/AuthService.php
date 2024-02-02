<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class AuthService{
	
	public function set(Request $request, User $user) : void{
		$username = str_replace(' ', '', $user->username);
		$request->session()->put('authenticated_user', [
			'user_id' => $user->id,
			'username' => $username
		]);
	}

	public function get(Request $request) : ?AuthSession{
		$session = $request->session()->get('authenticated_user');
		if($session === null) {
			return null;
		}
		return new AuthSession($session['user_id'], $session['username']);
	}

	public function isAuthenticated(Request $request) : bool{
		return $this->get($request) !== null;
	}

    public function createAccount(string $username, string $password, string $email) : User
	{
		$username2 = str_replace(' ', '', $username);
		$user = new User();
		$user->username = $username2;
		$user->setPassword($password);
		$user->email = $email;
		$user->save();
		return $user;
	}

}
