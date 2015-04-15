<?php

use PortalPeru\Entities\Category;
use PortalPeru\Repositories\CategoryRepo;

class AdminCategoriesController extends \BaseController {

    protected  $rules = [
        'titulo' => 'required',
        'publicar' => 'required|in:1,0'
    ];

    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $categories = $this->categoryRepo->orderBy('titulo', 'asc');
        return View::make('admin.categories.list', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.categories.create');
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
            $slug_url = SlugUrl($titulo);

            $category = new Category($data);
            $category->slug_url = $slug_url;
            $category->user_id = Auth::user()->id;
            $this->categoryRepo->create($category, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.categories.index');
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
        $category = $this->categoryRepo->findOrFail($id);
        return View::make('admin.categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->findOrFail($id);
        return View::make('admin.categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $category = $this->categoryRepo->findOrFail($id);

        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = SlugUrl($titulo);

            //GUARDAR DATOS
            $category->slug_url = $slug_url;
            $category->user_id = Auth::user()->id;
            $this->categoryRepo->update($category, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.categories.index');
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
        $category = Category::find($id);
        $category->delete();
        return Redirect::route('administrador.categories.index');
    }

}