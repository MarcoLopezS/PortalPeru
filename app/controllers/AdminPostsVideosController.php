<?php

use PortalPeru\Repositories\BaseRepo;

use PortalPeru\Repositories\PostRepo;

use PortalPeru\Entities\PostVideo;
use PortalPeru\Repositories\PostVideoRepo;

class AdminPostsVideosController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'video' => 'required',
    ];

    protected $postRepo;
    protected $postVideoRepo;

    public function __construct(PostRepo $postRepo,
                                PostVideoRepo $postVideoRepo)
    {
        $this->postRepo = $postRepo;
        $this->postVideoRepo = $postVideoRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($post)
    {
        $posts = $this->postRepo->findOrFail($post);
        $videos = $this->postVideoRepo->where('post_id', $post)->orderBY('created_at', 'desc')->paginate(15);
        
        return View::make('admin.posts-videos.list', compact('posts', 'videos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($post)
    {
        $posts = $this->postRepo->findOrFail($post);

        return View::make('admin.posts-videos.create', compact('posts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($post)
    {
        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //GUARDAR DATOS
            $video = new PostVideo($data);
            $video->user_id = Auth::user()->id;
            $video->post_id = $post;
            $this->postVideoRepo->create($video, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.post.videos.index', $post);
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
    public function show($post, $id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($post, $id)
    {
        $posts = $this->postRepo->findOrFail($post);
        $post = $this->postVideoRepo->findOrFail($id);

        return View::make('admin.posts-videos.edit', compact('posts','post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($post, $id)
    {
        $postVideo = $this->postVideoRepo->findOrFail($id);

        $data = Input::only(['titulo','video']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $video = Input::get('video');

            //GUARDAR DATOS
            $postVideo->video = $video;
            $this->postVideoRepo->update($postVideo, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.post.videos.index', $post);
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
    public function destroy($post, $id)
    {
        $postVideo = PostVideo::find($id);
        $postVideo->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if(Request::ajax())
        {
            return Response::json([
                'message' => $message
            ]);
        }

        return Redirect::route('administrador.post.videos.index', $post);
    }

}