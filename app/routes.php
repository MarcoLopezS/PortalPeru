<?php

/* VARIABLES */
Route::pattern('id', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('gallery', '[0-9]+');

/* FRONTEND */

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@construccion']);
Route::get('nota/{id}-{url}', ['as' => 'home.noticia', 'uses' => 'FrontendController@noticia']);
Route::get('seccion/{url}', ['as' => 'home.noticia.categoria', 'uses' => 'FrontendController@noticiaCategoria']);
Route::get('buscar/b={texto}', ['as' => 'home.buscar', 'uses' => 'FrontendController@buscar']);
Route::get('columnistas', ['as' => 'home.columnistas.list', 'uses' => 'FrontendController@columnistasList']);
Route::get('columnistas/{id}-{url}', ['as' => 'home.columnistas.person', 'uses' => 'FrontendController@columnistasPerson']);
Route::get('columnistas/{id}-{url}/{idColumn}-{urlColumn}', ['as' => 'home.columnistas.column', 'uses' => 'FrontendController@columnistasColumn']);

/* IMAGENES */
Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);

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

    //COLUMNISTAS
    Route::resource('administrador/columnist', 'AdminColumnistsController');
    Route::post('administrador/columnist/{id}/edit/img', ['as' => 'administrador.columnist.imagen', 'uses' => 'AdminColumnistsController@imagen']);
    Route::post('administrador/columnist/{id}/edit/imgPort', ['as' => 'administrador.columnist.imagenPortada', 'uses' => 'AdminColumnistsController@imagenPortada']);

    //COLUMNAS
    //Route::resource('administrador/columns', 'AdminColumnsController');
    Route::get('administrador/columns/{id}', ['as' => 'administrador.columns.list', 'uses' => 'AdminColumnsController@lists']);
    Route::get('administrador/columns/{id}/create', ['as' => 'administrador.columns.create', 'uses' => 'AdminColumnsController@create']);
    Route::post('administrador/columns/{id}/create', ['as' => 'administrador.columns.store', 'uses' => 'AdminColumnsController@store']);
    Route::get('administrador/columns/{id}/show/{idColumn}', ['as' => 'administrador.columns.show', 'uses' => 'AdminColumnsController@show']);
    Route::get('administrador/columns/{id}/edit/{idColumn}', ['as' => 'administrador.columns.edit', 'uses' => 'AdminColumnsController@edit']);
    Route::post('administrador/columns/{id}/edit/{idColumn}', ['as' => 'administrador.columns.update', 'uses' => 'AdminColumnsController@update']);
    Route::get('administrador/columns/{id}/destroy/{idColumn}', ['as' => 'administrador.columns.destroy', 'uses' => 'AdminColumnsController@destroy']);
    Route::get('administrador/columns/{id}/photos/{idColumn}', ['as' => 'administrador.columns.photoslist', 'uses' => 'AdminColumnsController@photosList' ]);

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