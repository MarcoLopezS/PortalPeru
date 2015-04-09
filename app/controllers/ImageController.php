<?php

class ImageController extends BaseController {

    public function adaptiveResize($folder, $width, $height, $image)
    {
        $file = 'upload/' . $folder . '/' .$image;
        $thumb = PhpThumbFactory::create($file);
        $thumb->adaptiveResize($width, $height);
        $thumb->show();
    }

} 