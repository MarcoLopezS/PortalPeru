<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\PostPhoto;

class PostPhotoRepo extends BaseRepo{

    public function getModel()
    {
        return new PostPhoto;
    }
}