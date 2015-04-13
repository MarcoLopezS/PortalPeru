<?php

use PortalPeru\Entities\Columnist;
use PortalPeru\Repositories\BaseRepo;
use PortalPeru\Repositories\ColumnistRepo;

class AdminColumnistsController extends \BaseController {

    protected $rules = [
        'nombre' => 'required',
        'apellidos' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'dia_lunes' => 'in:1,0',
        'dia_martes' => 'in:1,0',
        'dia_miercoles' => 'in:1,0',
        'dia_jueves' => 'in:1,0',
        'dia_viernes' => 'in:1,0',
        'dia_sabado' => 'in:1,0',
        'dia_domingo' => 'in:1,0',
        'publicar' => 'required|in:1,0'
    ];

    protected $rulesImg = [
        'imagen' => 'mimes:jpg,jpeg,png'
    ];

    protected $columnistRepo;

    public function __construct(ColumnistRepo $columnistRepo)
    {
        $this->columnistRepo = $columnistRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = $this->columnistRepo->search(Input::all(), BaseRepo::PAGINATE, 'nombre', 'asc');
        return View::make('admin.columnist.list', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.columnist.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //CREAR CARPETA CON FECHA Y MOVER IMAGEN
            CrearCarpeta();
            $ruta = "upload/columnista/";
            $archivo = Input::file('imagen');
            $file = FileMove($archivo,$ruta);

            $archivo_portada = Input::file('imagen_portada');
            $file_portada = FileMove($archivo_portada,$ruta);

            //VARIABLES
            $nombre = Input::get('nombre');
            $apellidos = Input::get('apellidos');
            $titulo = $nombre." ".$apellidos;

            //CONVERTIR TITULO A URL$union_tags
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $post = new Columnist($data);
            $post->slug_url = $slug_url;
            $post->foto = $file;
            $post->imagen_portada = $file_portada;
            $post->dia_lunes = Input::get('dia_lunes');
            $post->dia_martes = Input::get('dia_martes');
            $post->dia_miercoles = Input::get('dia_miercoles');
            $post->dia_jueves = Input::get('dia_jueves');
            $post->dia_viernes = Input::get('dia_viernes');
            $post->dia_sabado = Input::get('dia_sabado');
            $post->dia_domingo = Input::get('dia_domingo');
            $this->columnistRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columnist.index');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
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
        $post = $this->columnistRepo->findOrFail($id);

        return View::make('admin.columnist.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->columnistRepo->findOrFail($id);

        return View::make('admin.columnist.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = $this->columnistRepo->findOrFail($id);

        $data = Input::only(['nombre','apellidos','descripcion','dia_lunes','dia_martes','dia_miercoles','dia_jueves','dia_viernes','dia_sabado','dia_domingo','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $nombre = Input::get('nombre');
            $apellidos = Input::get('apellidos');
            $titulo = $nombre." ".$apellidos;

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $post->dia_lunes = Input::get('dia_lunes');
            $post->dia_martes = Input::get('dia_martes');
            $post->dia_miercoles = Input::get('dia_miercoles');
            $post->dia_jueves = Input::get('dia_jueves');
            $post->dia_viernes = Input::get('dia_viernes');
            $post->dia_sabado = Input::get('dia_sabado');
            $post->dia_domingo = Input::get('dia_domingo');
            $post->slug_url = $slug_url;
            $this->columnistRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columnist.index');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


    public function imagen($id)
    {
        $post = $this->columnistRepo->findOrFail($id);

        $data = Input::only(['imagen']);

        $validator = Validator::make($data, $this->rulesImg);

        if($validator->passes())
        {
            $ruta = "upload/columnista/";

            //VERIFICAR SI SUBIO FOTO
            if(Input::hasFile('imagen'))
            {
                CrearCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
            }else{
                $file = Input::get('imagen_actual');
            }

            //GUARDAR DATOS
            $post->foto = $file;
            $this->columnistRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columnist.edit', $id);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    public function imagenPortada($id)
    {
        $post = $this->columnistRepo->findOrFail($id);

        $data = Input::only(['imagen']);

        $validator = Validator::make($data, $this->rulesImg);

        if($validator->passes())
        {
            $ruta = "upload/columnista/";

            //VERIFICAR SI SUBIO FOTO
            if(Input::hasFile('imagen'))
            {
                CrearCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
            }else{
                $file = Input::get('imagen_actual');
            }

            //GUARDAR DATOS
            $post->imagen_portada = $file;
            $this->columnistRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columnist.edit', $id);
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

    public function photosList($post)
    {
        $posts = $this->columnistRepo->findOrFail($post);
        $photos = $this->postPhotoRepo->where('post_id', $post)->get();
        return View::make('admin.posts-photos.list', compact('posts', 'photos'));
    }

    public function photosUpload($post)
    {
        $posts = $this->columnistRepo->findOrFail($post);
        return View::make('admin.posts-photos.upload', compact('posts'));
    }

    public function photosUploadSave($post)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        CrearCarpeta();
        $ruta = "upload/".FechaCarpeta();
        $ruta_fecha = FechaCarpeta();
        $archivo = Input::file('file');
        $file = FileMove($archivo,$ruta);

        //GUARDAR DATOS
        $photo = new PostPhoto();
        $photo->imagen = $file;
        $photo->imagen_carpeta = $ruta_fecha;
        $photo->post_id = $post;
        $photo->user_id = \Auth::user()->id;
        $photo->save();
    }


}