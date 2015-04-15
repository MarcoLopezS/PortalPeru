<?php

class AuthController extends \BaseController {

    public function show()
	{
		return View::make('admin.login');
	}

	public function login()
	{
		$data = Input::only('email', 'password', 'remember');

		$credentials = ['email'=>$data['email'], 'password'=>$data['password'], 'activacion' => 1];

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
		}else{
            $login_error = 'El email y/o contraseña no coinciden, o puede que su cuenta todavia no haya sido activada.';

            return Redirect::route('reportero.login')->with('login_error', $login_error);
        }

	}

	public function logout()
	{
        Auth::logout();
        return Redirect::route('administrador.login.show');
	}

}