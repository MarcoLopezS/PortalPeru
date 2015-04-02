<?php

use PortalPeru\Entities\Gallery;
use PortalPeru\Entities\GalleryPhoto;
use PortalPeru\Repositories\BaseRepo;
use PortalPeru\Repositories\GalleryRepo;
use PortalPeru\Repositories\GalleryPhotoRepo;

class AdminGalleriesController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'contenido' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png',
        'publicar' => 'required|in:1,0'
    ];

    protected $galleryRepo;
    protected $galleryPhotoRepo;

    public function __construct(GalleryRepo $galleryRepo,
                                GalleryPhotoRepo $galleryPhotoRepo)
    {
        $this->galleryRepo = $galleryRepo;
        $this->galleryPhotoRepo = $galleryPhotoRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $gallery = $this->galleryRepo->search(Input::all(), BaseRepo::PAGINATE, 'published_at', 'desc');
        return View::make('admin.galleries.list', compact('gallery'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.galleries.create');
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
            $ruta = "upload/".FechaCarpeta();
            $ruta_fecha = FechaCarpeta();
            $archivo = Input::file('imagen');
            $file = FileMove($archivo,$ruta);

            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL$union_tags
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $gallery = new Gallery($data);
            $gallery->slug_url = $slug_url;
            $gallery->imagen = $file;
            $gallery->imagen_carpeta = $ruta_fecha;
            $gallery->user_id = Auth::user()->id;
            $gallery->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.gallery.index');
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
        $gallery = $this->galleryRepo->findOrFail($id);

        return View::make('admin.galleries.show', compact('gallery'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $gallery = $this->galleryRepo->findOrFail($id);

        return View::make('admin.galleries.edit', compact('gallery'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $gallery = $this->galleryRepo->findOrFail($id);

        $data = Input::only(['titulo','descripcion','contenido','published_at','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/".FechaCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
                $imagen = $file;
                $imagen_carpeta = FechaCarpeta();
            }else{
                $imagen = Input::get('imagen_actual');
                $imagen_carpeta = Input::get('imagen_actual_carpeta');
            }

            //GUARDAR DATOS
            $gallery->imagen = $imagen;
            $gallery->imagen_carpeta = $imagen_carpeta;
            $gallery->slug_url = $slug_url;
            $gallery->user_id = Auth::user()->id;
            $gallery->fill($data);
            $gallery->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.gallery.index');
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

    public function photosList($gallery)
    {
        $galleries = $this->galleryRepo->findOrFail($gallery);
        $photos = $this->galleryPhotoRepo->where('gallery_id', $gallery)->orderBy('orden', 'asc')->get();
        return View::make('admin.galleries-photos.list', compact('galleries', 'photos'));
    }

    public function photosUpload($gallery)
    {
        $galleries = $this->galleryRepo->findOrFail($gallery);
        return View::make('admin.galleries-photos.upload', compact('galleries'));
    }

    public function photosUploadSave($gallery)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        CrearCarpeta();
        $ruta = "upload/".FechaCarpeta();
        $ruta_fecha = FechaCarpeta();
        $archivo = Input::file('file');
        $file = FileMove($archivo,$ruta);

        //GUARDAR DATOS
        $photo = new GalleryPhoto();
        $photo->imagen = $file;
        $photo->imagen_carpeta = $ruta_fecha;
        $photo->gallery_id = $gallery;
        $photo->user_id = Auth::user()->id;
        $photo->save();
    }


}