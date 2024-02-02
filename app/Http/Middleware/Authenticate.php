<?php

namespace App\Http\Middleware;

use App\Services\Auth\AuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function redirect;

class Authenticate
{
	private AuthService $service;

	public function __construct()
	{
		$this->service = new AuthService();
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		$user = $this->service->get($request);
		if ($user === null) {
			return redirect('auth/login');
		}
		$request->setUserResolver(fn () => $user);
		return $next($request);
	}
}
