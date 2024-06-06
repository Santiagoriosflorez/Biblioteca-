<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

	protected $redirectTo = RouteServiceProvider::HOME;


	public function __construct()
	{
		$this->middleware('guest');
	}


	protected function register(UserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		$user->assignRole('user');
		Auth::login($user);
		return redirect($this->redirectPath());
	}
}
