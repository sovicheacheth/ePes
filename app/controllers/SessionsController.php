<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	 */
	public function login()
	{
		$data = Input::all();

		$attempt = Auth::attempt([
			'employee_no' 	=> $data['employee_no'],
			'password'		=> $data['password']
		]);

		if (Auth::check() == false) {
			Session::flash('error', 'Invalid user credentials please check your username or password');
			return Redirect::back();
		}

		$user = Auth::getUser();
		// Roles distinction
		if ($user->role->name == 'admin') {
			return Redirect::to('/admin');
		} else if ($user->role->name == 'employee') {
			return Redirect::to('/employees');
		}

		Session::flash('error', 'Invalid user credentials please check your username or password');
		return Redirect::back();
	}


	/**
	 * Logout an authenticated user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}


}