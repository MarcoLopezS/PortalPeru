<?php

use PortalPeru\Entities\User;
use PortalPeru\Entities\UserProfile;

class ReporteroController extends BaseController {

    public function register()
    {
        return View::make('reportero.register');
    }

    public function registerCreate()
    {
        $rulesUser = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $rulesProfile = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'documento_tipo' => 'required',
            'documento_numero' => 'required',
            'direccion' => 'required',
        ];

        $dataUser = Input::only('email','password','password_confirmation');
        $dataProfile = Input::only('nombre','apellidos','telefono','documento_tipo','documento_numero','direccion');

        $validatorUser = Validator::make($dataUser, $rulesUser);
        $validatorProfile = Validator::make($dataProfile, $rulesProfile);

        if($validatorUser->passes() and $validatorProfile->passes())
        {
            $user = new User($dataUser);
            $user->type = 'reportero';
            $user->save();

            $emailUser = User::whereEmail(Input::get('email'))->first();

            $userProfile = new UserProfile($dataProfile);
            $userProfile->user_id = $emailUser->id;
            $userProfile->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return View::make('reportero.verify');
        }
        else
        {
            return Redirect::back()->with('errors', array_merge_recursive($validatorUser->messages()->toArray(), $validatorProfile->messages()->toArray()))->withInput();
        }
    }

    public function loginView()
    {
        return View::make('reportero.login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('reportero.login');
    }

    public function home()
    {
        return View::make('reportero.admin.home');
    }
} 