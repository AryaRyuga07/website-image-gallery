<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Services\Auth\AuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    private AuthService $service;

	public function __construct(){
		$this->service = new AuthService();
	}
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if($this->service->get($request) !== null) {
			return Redirect::back();
		}

        return $next($request);
    }
}
