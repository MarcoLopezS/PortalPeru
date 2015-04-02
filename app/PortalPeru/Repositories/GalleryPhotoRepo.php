<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\GalleryPhoto;

class GalleryPhotoRepo extends BaseRepo {

    public function getModel()
    {
        return new GalleryPhoto;
    }
}