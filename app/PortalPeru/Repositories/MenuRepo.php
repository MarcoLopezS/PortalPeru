<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Menu;

class MenuRepo extends BaseRepo{

    public function getModel()
    {
        return new Menu;
    }

    //LISTA DE MENU PARA ADMINISTRADOR
    public function menuList( $id_padre = 0 ){
        $menu = '';
        $query = $this->getModel()->orderBy('orden', 'asc')->where('parent_id', $id_padre)->get();
        $cant = $this->getModel()->all()->count();
        if( $cant > 0 ){ $menu .= '<ol class="dd-list">'; }
        foreach ($query as $item){
            $menu .=  '<li class="dd-item dd3-item" data-id="' . $item->id . '">';
            $menu .= '<div class="dd-handle dd3-handle"></div>';
            $menu .= '<div class="dd3-content">' . $item->titulo;
            $menu .= '<span><a class="deleteMenu" id="' . $item->id . '" href="javascript:;">Eliminar</a></span>';
            $menu .=  '</div>';
            $menu .= $this->menuList( $item->id ) . '</li>';
        }
        if( $cant > 0 ){ $menu .= '</ol>'; }
        return $menu;
    }

}