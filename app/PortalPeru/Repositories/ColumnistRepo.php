<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Columnist;

class ColumnistRepo extends BaseRepo{

    public function getModel()
    {
        return new Columnist;
    }

    public $filters = ['nombre', 'publicar'];

    public function filterByNombre($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
}