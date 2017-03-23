<?php

use PortalPeru\Entities\User;
use PortalPeru\Entities\UserProfile;
use PortalPeru\Repositories\BaseRepo;
use PortalPeru\Repositories\UserRepo;

class AdminUsersController extends \BaseController {

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ];

    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->userRepo->searchUsers(Input::all(), BaseRepo::PAGINATE, 'Id', 'asc');

        return View::make('admin.users.list', compact('users'));
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rulesUser = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'type' => 'required|in:admin,editor'
        ];

        $rulesProfile = [
            'nombre' => 'required',
            'apellidos' => 'required'
        ];

        $dataUser = Input::only('email','password','password_confirmation','type');
        $dataProfile = Input::only('nombre','apellidos');

        $validatorUser = Validator::make($dataUser, $rulesUser);
        $validatorProfile = Validator::make($dataProfile, $rulesProfile);

        if($validatorUser->passes() and $validatorProfile->passes())
        {
            $user = new User($dataUser);
            $user->activacion = 1;
            $user->save();

            $emailUser = User::whereEmail(Input::get('email'))->first();
            $actCodigo = CodigoAleatorio(50,true, true, false);

            $userProfile = new UserProfile($dataProfile);
            $userProfile->user_id = $emailUser->id;
            $userProfile->activacion_codigo = $actCodigo;
            $userProfile->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.users.index');
        }
        else
        {
            return Redirect::back()->with('errors', array_merge_recursive($validatorUser->messages()->toArray(), $validatorProfile->messages()->toArray()))->withInput();
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = $this->userRepo->findOrFail($id);

        return View::make('admin.users.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = $this->userRepo->findOrFail($id);

        return View::make('admin.users.edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateData($id)
    {
        $user = UserProfile::whereUserId($id)->first();

        $data = Input::only('nombre','apellidos');

        $rules = [
            'nombre' => 'required',
            'apellidos' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $user->fill($data);
            $user->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.users.index');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    /**
     * Funcion para cambiar contraseña de Perfil de usuario logeado
     * @param $id
     * @return
     */
    public function updateChangePassword($id)
    {
        $user = $this->userRepo->findOrFail($id);

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
            return Redirect::route('administrador.users.index');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Listar Usuarios de Reportero Ciudadano
     */
    public function reporteroList()
    {
        $users = $this->userRepo->searchReportero(Input::all(), BaseRepo::PAGINATE, 'email', 'asc');

        return View::make('admin.users.reportero', compact('users'));
    }

    /**
     * Ver datos de Reportero Ciudadano seleccionado
     */
    public function reporteroView($id)
    {
        $user = User::find($id);

        $nombre = $user->profile->nombre." ".$user->profile->apellidos;
        if($user->profile->imagen <> ""){
            $imagen = "/upload/reportero/200x200/".$user->profile->imagen;
        }else{
            $imagen = "/imagenes/rciud/usuario.jpg";
        }

        //NOTICIAS
        $notEnviadas = $user->post->count();
        $notPublicas = $user->postPublicar();

        if(Request::ajax())
        {
            return Response::json([
                'nombre'    => $nombre,
                'imagen'    => $imagen,
                'email'     => $user->email,
                'estado'    => $user->activacion ? 'Activado' : 'No activado',
                'fregistro' => date_format(new DateTime($user->created_at), 'd/m/Y H:i'),
                'notenviadas' => $notEnviadas,
                'notpublicas' => $notPublicas,
            ]);
        }
    }


    /**
     * Funcion para mostar Perfil de usuario logeado
     */

    public function profile()
    {
        $user = Auth::user();

        return View::make('admin.users.profile', compact('user'));

    }

    /**
     * Funcion para cambiar datos de Perfil de usuario logeado
     */
    public function profileData()
    {
        $user = Auth::user();

        $profile = UserProfile::whereUserId($user->id)->first();

        $data = Input::all();

        $rules = [
            'nombre' => 'required',
            'apellidos' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $profile->fill($data);
            $profile->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.users.profile');
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
