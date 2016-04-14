<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\PostVideo;

class PostVideoRepo extends BaseRepo{

    public function getModel()
    {
        return new PostVideo;
    }

}