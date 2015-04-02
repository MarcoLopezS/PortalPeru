<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\PostOrder;

class PostOrderRepo extends BaseRepo{

    public function getModel()
    {
        return new PostOrder;
    }

}