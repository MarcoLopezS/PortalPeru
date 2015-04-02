<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Gallery;

class GalleryRepo extends BaseRepo {

    public function getModel()
    {
        return new Gallery;
    }

    public $filters = ['search', 'publicar'];
}