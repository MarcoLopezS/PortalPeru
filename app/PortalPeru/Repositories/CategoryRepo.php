<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Category;

class CategoryRepo extends BaseRepo {

    public function getModel()
    {
        return new Category;
    }
}