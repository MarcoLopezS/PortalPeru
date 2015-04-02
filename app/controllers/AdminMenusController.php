<?php

use PortalPeru\Entities\Menu;
use PortalPeru\Repositories\CategoryRepo;
use PortalPeru\Repositories\MenuRepo;
use PortalPeru\Repositories\PageRepo;

class AdminMenusController extends \BaseController {

    protected $categoryRepo;
    protected $menuRepo;
    protected $pageRepo;

    public function __construct(CategoryRepo $categoryRepo,
                                MenuRepo $menuRepo,
                                PageRepo $pageRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->menuRepo = $menuRepo;
        $this->pageRepo = $pageRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pagesList = $this->pageRepo->all();
        $categoriesList = $this->categoryRepo->all();
        $menus = $this->menuRepo->menuList();

        return View::make('admin.menu.list', compact('pagesList', 'categoriesList', 'menus'));
	}

    /*
     * Funcion para guardar datos de categoria en menu
     */
    public function category()
    {
        $data = Input::only(['categories']);

        //DATOS DE CATEGORIA SELECCIONADA
        $select = Input::get('categories');
        $category = $this->categoryRepo->findOrFail($select);
        $id = $category->id;
        $titulo = $category->titulo;
        $slug_url = $category->slug_url;

        //GUARDAR DATOS
        $menu = new Menu($data);
        $menu->titulo = $titulo;
        $menu->slug_url = $slug_url;
        $menu->object_id = $id;
        $menu->type = 'category';
        $menu->parent_id = '0';
        $menu->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return Redirect::route('administrador.menu.index');
    }

    /*
     * Funcion para guardar datos de pagina en menu
     */
    public function page()
    {
        $data = Input::only(['pages']);

        //DATOS DE PAGINA SELECCIONADA
        $select = Input::get('pages');
        $page = $this->pageRepo->findOrFail($select);
        $id = $page->id;
        $titulo = $page->titulo;
        $slug_url = $page->slug_url;

        //GUARDAR DATOS
        $menu = new Menu($data);
        $menu->titulo = $titulo;
        $menu->slug_url = $slug_url;
        $menu->object_id = $id;
        $menu->type = 'page';
        $menu->parent_id = '0';
        $menu->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return Redirect::route('administrador.menu.index');
    }

    /*
     * Funcion para guardar datos de link menu
     */
    public function link()
    {
        $data = Input::only(['titulo', 'enlace']);

        //DATOS
        $titulo = Input::get('titulo');
        $slug_url = Input::get('enlace');

        //GUARDAR
        $menu = new Menu($data);
        $menu->titulo = $titulo;
        $menu->slug_url = $slug_url;
        $menu->type = 'link';
        $menu->parent_id = '0';
        $menu->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return Redirect::route('administrador.menu.index');
    }

    /*
     * Funcion para guardar orden de menu
     */
    public function order()
    {
        $data = Input::only(['menu_order', 'menu_delete']);

        //DATOS
        $orden = json_decode(Input::get('menu_order'), true);

        //CANTIDAD DE VALORES EN ARRAY
        $count = count($orden);

        //GUARDAR VARIABLES
        for ($i = 0; $i < $count; $i++) {
            $item = $orden[$i]["id"];

            $menu = $this->menuRepo->findOrFail($item);
            $menu->orden = $i;
            $menu->parent_id = 0;
            $menu->fill($data);
            $menu->save();

            $valor = $orden[$i];

            if (array_key_exists('children', $valor)) {

                $valor = $orden[$i]["children"];
                $contar = count($valor);

                if ($contar <> 0) {
                    for ($f = 0; $f < $contar; $f++) {
                        $itemCh = $orden[$i]["children"][$f]["id"];

                        $menu = $this->menuRepo->findOrFail($itemCh);
                        $menu->orden = $f;
                        $menu->parent_id = $item;
                        $menu->fill($data);
                        $menu->save();
                    }
                }

            } else {
                $agregar = array_add($orden[$i], "children", []);

                if (array_key_exists('children', $agregar)) {

                    $valor = $agregar["children"];
                    $contar = count($valor);

                    if ($contar <> 0) {
                        for ($f = 0; $f < $contar; $f++) {
                            $itemCh = $agregar[$i]["children"][$f]["id"];

                            $menu = $this->menuRepo->findOrFail($itemCh);
                            $menu->orden = $f;
                            $menu->parent_id = $item;
                            $menu->fill($data);
                            $menu->save();
                        }
                    }

                }
            }
        }

        //ELIMINAR VARIABLES
        $delete = Input::get('menu_delete');
        if($delete<>""){
            $items = explode("-", $delete);
            $contarDl = count($items);

            for($i = 0; $i < $contarDl; $i++){
                $menu = $this->menuRepo->find($items[$i]);
                if(!is_null($menu)){
                    $menu->delete();
                }
            }
        }

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return Redirect::route('administrador.menu.index');
    }

}
