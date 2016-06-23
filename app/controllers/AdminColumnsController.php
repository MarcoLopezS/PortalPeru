<?php

use PortalPeru\Entities\Column;
use PortalPeru\Repositories\BaseRepo;
use PortalPeru\Repositories\ColumnistRepo;
use PortalPeru\Repositories\ColumnRepo;

class AdminColumnsController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'contenido' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png',
        'published_at' => 'required',
        'publicar' => 'required|in:1,0'
    ];

    protected $columnistRepo;
    protected $columnRepo;

    public function __construct(ColumnRepo $columnRepo,
                                ColumnistRepo $columnistRepo)
    {
        $this->columnistRepo = $columnistRepo;
        $this->columnRepo = $columnRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function lists($id)
    {
        $columnista = $this->columnistRepo->findOrFail($id);
        $columnas = $this->columnRepo->searchColumn(Input::all(), BaseRepo::PAGINATE, 'published_at', 'desc', $id);

        return View::make('admin.columns.list', compact('columnista', 'columnas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $columnista = $this->columnistRepo->findOrFail($id);

        return View::make('admin.columns.create', compact('columnista'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id)
    {
        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/".FechaCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
                $imagen = $file;
                $imagen_carpeta = FechaCarpeta();
            }else{
                $imagen = "";
                $imagen_carpeta = "";
            }

            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = SlugUrl($titulo);

            //GUARDAR DATOS
            $post = new Column($data);
            $post->slug_url = $slug_url;
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
            $post->columnist_id = $id;
            $post->user_id = Auth::user()->id;
            $this->columnRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columns.list', [$id]);
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
    public function show($id, $idColumn)
    {
        $columnista = $this->columnistRepo->findOrFail($id);
        $columna = $this->columnRepo->findOrFail($idColumn);

        return View::make('admin.columns.show', compact('columnista','columna'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, $idCoulumn)
    {
        $columnista = $this->columnistRepo->findOrFail($id);
        $post = $this->columnRepo->findOrFail($idCoulumn);

        return View::make('admin.columns.edit', compact('columnista', 'post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, $idColumn)
    {
        $post = $this->columnRepo->findOrFail($idColumn);

        $data = Input::only(['titulo','descripcion','contenido','published_at','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = SlugUrl($titulo);

            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/".FechaCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
                $imagen = $file;
                $imagen_carpeta = FechaCarpeta();
            }else{
                if(Input::get('imagen_actual')==""){
                    $imagen = "";
                    $imagen_carpeta = "";
                }else{
                    $imagen = Input::get('imagen_actual');
                    $imagen_carpeta = Input::get('imagen_actual_carpeta');
                }
            }

            //GUARDAR DATOS
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
            $post->slug_url = $slug_url;
            $post->user_id = Auth::user()->id;
            $this->columnRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.columns.list', $id);
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
    public function destroy($id, $idColumn)
    {
        $post = Column::find($idColumn);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if(Request::ajax())
        {
            return Response::json([
                'message' => $message
            ]);
        }
    }

    public function photosList($post)
    {
        $posts = $this->postRepo->findOrFail($post);
        $photos = $this->postPhotoRepo->where('post_id', $post)->get();
        return View::make('admin.posts-photos.list', compact('posts', 'photos'));
    }

    public function photosUpload($post)
    {
        $posts = $this->postRepo->findOrFail($post);
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