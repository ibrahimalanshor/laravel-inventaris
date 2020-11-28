<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

	protected $auth;

	public function __construct(AuthService $auth)
	{
		$this->middleware('guest')->except('logout');
		$this->auth = $auth;
	}

	public function showLoginForm() : View
	{
		return view('auth.login');			
	}

	public function login(LoginRequest $request) : RedirectResponse
	{
		$credentials = $request->only('username', 'password');
		$remember = $request->filled('remember');

		if ($this->auth->login($credentials, $remember)) {
			return redirect('/')->with('success', 'login');
		} else {
			return back()->with('error', 'Password Wrong');
		}
	}

	public function logout() : RedirectResponse
	{
		$this->auth->logout();

		return redirect('/login')->with('success', 'Logout Succes');
	}

}
