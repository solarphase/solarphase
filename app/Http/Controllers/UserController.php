<?php namespace SolarPhase\Http\Controllers;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Responds with a login form.
	 */
	public function login()
	{
		return view('user.login')->withModel([
			'email' => '',
			'remember' => false,
			'failure' => false,
		]);
	}

	/**
	 * Processes a login request.
	 *
	 * @param Request $request
	 */
	public function postLogin(Request $request)
	{
		$remember = $request->input('remember') === 'on';
		$input = [
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		];

		if (\Auth::attempt($input, $remember))
		{
			return redirect()->intended('/');
		}

		$input['remember'] = $remember;
		$input['failure'] = true;
		return view('user.login')->withModel($input);
	}

	/**
	 * Logs a currently authenticated user out.
	 */
	public function logout()
	{
		\Auth::logout();

		return redirect('/');
	}

}
