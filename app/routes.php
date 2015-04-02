<?php

/* VARIABLES */
Route::pattern('id', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('gallery', '[0-9]+');

/* FRONTEND */

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@home']);


/* IMAGENES */
Route::get('/upload/{folder}/{width}x{height}/{image}', function($folder, $width, $height, $image)
{
    $file = base_path() . '/public/upload/' . $folder . '/' .$image;
    App::make('phpthumb')->create('resize', array($file, $width, $height, 'adaptive'))->show();
});

/* ADMINISTRADOR */

//SI EL USUARIO ESTA CONECTADO NO MOSTRAR
Route::group(['before' => 'guest'], function () {

    /* LOGIN */
    Route::get('administrador/login', ['as' => 'administrador.login.show', 'uses' => 'AuthController@show']);
    Route::post('administrador/login', ['as' => 'administrador.login', 'uses' => 'AuthController@login']);

});

//SI EL USUARIO ESTA CONECTADO MOSTRAR
Route::group(['before' => 'auth'], function () {

    //PAGINAS
    Route::resource('administrador/pages', 'AdminPagesController');

    //POST
    Route::resource('administrador/posts', 'AdminPostsController');

    //GALERIA DE FOTOS DE POST
    Route::get('administrador/posts/photos/{post}', ['as' => 'administrador.post.photoslist', 'uses' => 'AdminPostsController@photosList' ]);
    Route::get('administrador/posts/photos/{post}/upload', ['as' => 'administrador.post.photosupload', 'uses' => 'AdminPostsController@photosUpload' ]);
    Route::post('administrador/posts/photos/{post}/upload', ['as' => 'administrador.post.photosuploadsave', 'uses' => 'AdminPostsController@photosUploadSave' ]);

    //CATEGORIAS DE POST
    Route::resource('administrador/categories', 'AdminCategoriesController');

    //TAGS DE POST
    Route::resource('administrador/tags', 'AdminTagsController');

    //GALERIA DE FOTOS
    Route::resource('administrador/gallery', 'AdminGalleriesController');

    //FOTOS DE GALERIA
    Route::get('administrador/gallery/photos/{gallery}', ['as' => 'administrador.gallery.photoslist', 'uses' => 'AdminGalleriesController@photosList' ]);
    Route::get('administrador/gallery/photos/{gallery}/upload', ['as' => 'administrador.gallery.photosupload', 'uses' => 'AdminGalleriesController@photosUpload' ]);
    Route::post('administrador/gallery/photos/{gallery}/upload', ['as' => 'administrador.gallery.photosuploadsave', 'uses' => 'AdminGalleriesController@photosUploadSave' ]);

    //SLIDERS
    Route::resource('administrador/slider', 'AdminSlidersController');
    //Route::post('administrador/slider/upload', ['as' => 'administrador.slider.photosuploadsave', 'uses' => 'AdminSlidersController@photosUploadSave' ]);

    //CONFIGURACIÓN
    Route::resource('administrador/config', 'AdminConfigsController');

    //MENU
    Route::resource('administrador/menu', 'AdminMenusController');
    Route::post('administrador/menu/category', ['as' => 'administrador.menu.category', 'uses' => 'AdminMenusController@category' ]);
    Route::post('administrador/menu/page', ['as' => 'administrador.menu.page', 'uses' => 'AdminMenusController@page' ]);
    Route::post('administrador/menu/link', ['as' => 'administrador.menu.link', 'uses' => 'AdminMenusController@link' ]);
    Route::post('administrador/menu/order', ['as' => 'administrador.menu.order', 'uses' => 'AdminMenusController@order' ]);

    //USUARIO
    Route::resource('administrador/users', 'AdminUsersController');
    Route::get('administrador/profile', ['as' => 'administrador.users.profile', 'uses' => 'AdminUsersController@profile' ]);
    Route::post('administrador/profile/password', ['as' => 'administrador.users.profilePassword', 'uses' => 'AdminUsersController@profileChangePassword' ]);

    //ADMIN
    Route::get('administrador', ['as' => 'administrador.index', 'uses' => 'AdminController@show']);
    Route::get('administrador/logout', ['as' => 'administrador.logout', 'uses' => 'AuthController@logout']);

});