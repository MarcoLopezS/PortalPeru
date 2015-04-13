<?php

class AuthController extends \BaseController {

    public function show()
	{
		return View::make('admin.login');
	}

	public function login()
	{
		$data = Input::only('email', 'password', 'remember');

		$credentials = ['email'=>$data['email'], 'password'=>$data['password']];

		if(Auth::attempt($credentials, $data['remember']))
		{
            if(Auth::user()->type == 'admin' OR Auth::user()->type == 'editor')
            {
                return Redirect::route('administrador.index');
            }
            elseif(Auth::user()->type == 'reportero')
            {
                return Redirect::route('reportero-ciudadano.posts.index');
            }

		}

		return Redirect::back()->with('login_error', 1);
	}

	public function logout()
	{
        Auth::logout();
        return Redirect::route('administrador.login.show');
	}

}