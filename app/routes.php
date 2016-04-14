<?php

/* IMAGENES */
Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);

include_once('PortalPeru/Routes/Administrador.php');

include_once('PortalPeru/Routes/Frontend.php');

View::composer(['layouts.frontend', 'frontend.partials.sidebar'], 'PortalPeru\Composers\FrontendComposer');