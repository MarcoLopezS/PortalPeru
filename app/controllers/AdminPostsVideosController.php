<?php

use PortalPeru\Repositories\BaseRepo;

use PortalPeru\Entities\Post;
use PortalPeru\Repositories\PostRepo;
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

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($post, $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($post, $id)
    {

    }

}