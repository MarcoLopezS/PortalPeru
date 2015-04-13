<?php

use PortalPeru\Entities\Post;
use PortalPeru\Entities\PostPhoto;
use PortalPeru\Repositories\BaseRepo;
use PortalPeru\Repositories\CategoryRepo;
use PortalPeru\Repositories\PostOrderRepo;
use PortalPeru\Repositories\PostPhotoRepo;
use PortalPeru\Repositories\PostRepo;
use PortalPeru\Repositories\TagRepo;

class ReporteroPostsController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'contenido' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png'
    ];

    protected $postRepo;
    protected $postPhotoRepo;

    public function __construct(PostRepo $postRepo,
                                PostPhotoRepo $postPhotoRepo)
    {
        $this->postRepo = $postRepo;
        $this->postPhotoRepo = $postPhotoRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = Post::whereUserId(Auth::user()->id)->orderBy('published_at', 'desc')->paginate(10);
        return View::make('reportero.admin.posts.list', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('reportero.admin.posts.create');
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
            $video = Input::get('video');

            //CONVERTIR TITULO A URL$union_tags
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $post = new Post($data);
            $post->slug_url = $slug_url;
            $post->video = $video;
            $post->imagen = $file;
            $post->imagen_carpeta = $ruta_fecha;
            $post->publicar = 0;
            $post->post_order_id = 1;
            $post->category_id = 6;
            $post->user_id = Auth::user()->id;
            $this->postRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('reportero-ciudadano.posts.index');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


    public function photosList($post)
    {
        $posts = $this->postRepo->findOrFail($post);
        $photos = $this->postPhotoRepo->where('post_id', $post)->get();
        return View::make('reportero.admin.posts-photos.list', compact('posts', 'photos'));
    }

    public function photosUpload($post)
    {
        $posts = $this->postRepo->findOrFail($post);
        return View::make('reportero.admin.posts-photos.upload', compact('posts'));
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
        $photo->user_id = Auth::user()->id;
        $photo->save();
    }

    public function photosUploadDelete($post, $id)
    {
        $photo = PostPhoto::find($id);
        $photo->delete();
        return Redirect::route('reportero-ciudadano.post.photoslist', $post);
    }


}