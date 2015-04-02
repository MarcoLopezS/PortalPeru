<?php

use PortalPeru\Entities\Tag;
use PortalPeru\Repositories\TagRepo;

class AdminTagsController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'publicar' => 'required|in:1,0'
    ];

    protected $tagRepo;

    public function __construct(TagRepo $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $tags = $this->tagRepo->orderBy('titulo', 'asc');
        return View::make('admin.tags.list', compact('tags'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.tags.create');
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
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $tag = new Tag($data);
            $tag->slug_url = $slug_url;
            $tag->user_id = Auth::user()->id;
            $this->tagRepo->create($tag, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.tags.index');
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
        $tag = $this->tagRepo->findOrFail($id);
        return View::make('admin.tags.show', compact('tag'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepo->findOrFail($id);
        return View::make('admin.tags.edit', compact('tag'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $tag = $this->tagRepo->findOrFail($id);

        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $tag->slug_url = $slug_url;
            $tag->user_id = Auth::user()->id;
            $this->tagRepo->update($tag,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.tags.index');
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


}