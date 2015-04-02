<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Configuration;

class ConfigurationRepo extends BaseRepo{

    public function getModel()
    {
        return new Configuration;
    }

}