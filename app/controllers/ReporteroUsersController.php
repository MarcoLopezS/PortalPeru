<?php

use PortalPeru\Entities\UserProfile;

class ReporteroUsersController extends \BaseController {

	public function profile()
    {
        $user = Auth::user();

        Return View::make('reportero.admin.users.profile', compact('user'));

    }

    /**
     * Funcion para actualizar datos de usuario
     */
    public function profileData()
    {
        $user = UserProfile::find(Auth::user()->profile->id);

        $data = Input::only('nombre','apellidos','descripcion','telefono','direccion');

        $rules = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'descripcion' => 'min:0|max:220',
            'direccion' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $user->fill($data);
            $user->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('reportero-ciudadano.user.profile');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    /**
     * Funcion para actualizar redes sociales de usuario
     */
    public function profileSocial()
    {
        $user = UserProfile::find(Auth::user()->profile->id);

        $data = Input::only('social_facebook','social_twitter','social_google','social_youtube','social_pinterest','social_instagram','social_linkedin','social_tumblr');

        $rules = [
            'social_facebook' => 'min:0|max:200',
            'social_twitter' => 'min:0|max:200',
            'social_google' => 'min:0|max:200',
            'social_youtube' => 'min:0|max:200',
            'social_pinterest' => 'min:0|max:200',
            'social_instagram' => 'min:0|max:200',
            'social_linkedin' => 'min:0|max:200',
            'social_tumblr' => 'min:0|max:200'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $user->fill($data);
            $user->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('reportero-ciudadano.user.profile');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    /**
     * Funcion para actualizar foto de usuario
     */
    public function profilePhoto()
    {
        $user = UserProfile::find(Auth::user()->profile->id);

        $data = Input::only(['imagen']);

        $rules = [
            'imagen' => 'mimes:jpg,jpeg,png'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $ruta = "upload/reportero/";

            //VERIFICAR SI SUBIO FOTO
            if(Input::hasFile('imagen'))
            {
                CrearCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
            }else{
                $file = Input::get('imagen_actual');
            }

            $user->imagen = $file;
            $user->fill($data);
            $user->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('reportero-ciudadano.user.profile');


        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    /**
     * Funcion para cambiar contraseña de Perfil de usuario logeado
     */
    public function profileChangePassword()
    {
        $user = Auth::user();

        $data = Input::all();

        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $user->fill($data);
            $user->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.users.profile');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


}