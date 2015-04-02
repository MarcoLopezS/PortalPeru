<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Slider;

class SliderRepo extends BaseRepo{

    public function getModel()
    {
        return new Slider;
    }

}