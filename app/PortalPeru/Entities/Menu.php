<?php namespace PortalPeru\Entities;

class Menu extends BaseEntity{

    protected $fillable = [];

    protected $guarded = ['categories', 'pages', 'titulo', 'enlace', 'menu_order', 'menu_delete'];

}