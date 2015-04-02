<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Tag;

class TagRepo extends BaseRepo {

    public function getModel()
    {
        return new Tag;
    }
}