<?php

use PortalPeru\Entities\Slider;
use PortalPeru\Repositories\SliderRepo;

class AdminSlidersController extends \BaseController {

    protected $sliderRepo;

    public function __construct(SliderRepo $sliderRepo)
    {
        $this->sliderRepo = $sliderRepo;
    }

	/**
	 * Display a listing of the resource.
	 * GET /adminsliders
	 *
	 * @return Response
	 */
	public function index()
	{
		$sliders = $this->sliderRepo->orderBy('orden', 'asc');

        return View::make('admin.sliders.list', compact('sliders'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminsliders/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.sliders.upload');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminsliders
	 *
	 * @return Response
	 */
	public function store()
	{
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        CrearCarpeta();
        $ruta = "upload/".FechaCarpeta();
        $ruta_fecha = FechaCarpeta();
        $archivo = Input::file('file');
        $file = FileMove($archivo,$ruta);

        //GUARDAR DATOS
        $photo = new Slider();
        $photo->imagen = $file;
        $photo->imagen_carpeta = $ruta_fecha;
        $photo->user_id = Auth::user()->id;
        $photo->save();
	}

	/**
	 * Display the specified resource.
	 * GET /adminsliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adminsliders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adminsliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminsliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}