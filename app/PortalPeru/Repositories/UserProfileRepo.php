<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\UserProfile;

class UserProfileRepo extends BaseRepo{

    public function getModel()
    {
        return new UserProfile;
    }

}