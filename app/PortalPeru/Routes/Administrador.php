<?php

/* ADMINISTRADOR */

//SI EL USUARIO ESTA CONECTADO NO MOSTRAR
Route::group(['before' => 'guest'], function () {

    //ADMINISTRADOR
    Route::get('administrador/login', ['as' => 'administrador.login.show', 'uses' => 'AuthController@show']);
    Route::post('administrador/login', ['as' => 'administrador.login', 'uses' => 'AuthController@login']);

    //REPORTERO CIUDADANO
    Route::get('reportero-ciudadano/registro', ['as' => 'reportero.register', 'uses' => 'ReporteroController@register']);
    Route::post('reportero-ciudadano/registro', ['as' => 'reportero.register.create', 'uses' => 'ReporteroController@registerCreate']);
    
    Route::get('reportero-ciudadano/correo-activar-cuenta', ['as' => 'reportero.correoActivarCuenta', 'uses' => 'ReporteroController@correoActivarCuenta']);
    Route::post('reportero-ciudadano/correo-activar-cuenta', ['as' => 'reportero.correoActivarCuenta.form', 'uses' => 'ReporteroController@correoActivarCuentaForm']);
    
    Route::get('reportero-ciudadano/recuperar-clave', ['as' => 'reportero.correoPassword', 'uses' => 'RemindersController@getRemind']);
    Route::post('reportero-ciudadano/recuperar-clave', ['as' => 'reportero.correoPassword.form', 'uses' => 'RemindersController@postRemind']);

    Route::get('password/reset/{token}', ['as' => 'password.getReset', 'uses' => 'RemindersController@getReset']);
    Route::post('password/reset/{token}', ['as' => 'password.postReset', 'uses' => 'RemindersController@postReset']);
    
    Route::get('reportero-ciudadano/login', ['as' => 'reportero.login', 'uses' => 'ReporteroController@loginView']);
    Route::get('reportero-ciudadano/verify', ['as' => 'reportero.verifyView', 'uses' => 'ReporteroController@verifyView']);
    Route::get('reportero-ciudadano/verify/{codigo}', ['as' => 'reportero.verify', 'uses' => 'ReporteroController@verify']);

});

//SI EL USUARIO ESTA CONECTADO MOSTRAR
//Route::group(['before' => 'auth'], function () {
Route::group(['before' => ['auth']], function () {

    Route::group(['before' => 'roles:admin-editor,reportero-ciudadano/admin'], function () {

        //PAGINAS
        Route::resource('administrador/pages', 'AdminPagesController');

        //COLUMNISTAS
        Route::resource('administrador/columnist', 'AdminColumnistsController');
        Route::get('administrador/columnist-order', ['as' => 'administrador.columnist.order', 'uses' => 'AdminColumnistsController@order']);
        Route::post('administrador/columnist-order/order', ['as' => 'administrador.columnist.orderForm', 'uses' => 'AdminColumnistsController@orderForm' ]);
        Route::post('administrador/columnist/{id}/edit/img', ['as' => 'administrador.columnist.imagen', 'uses' => 'AdminColumnistsController@imagen']);
        Route::post('administrador/columnist/{id}/edit/imgPort', ['as' => 'administrador.columnist.imagenPortada', 'uses' => 'AdminColumnistsController@imagenPortada']);

        //DELETE
        Route::get('administrador/columnist-deletes', ['as' => 'administrador.columnist.deletes', 'uses' => 'AdminColumnistsController@listsDeletes']);
        Route::delete('administrador/columnist-deletes/destroy/{id}', ['as' => 'administrador.columnist.destroyTotal', 'uses' => 'AdminColumnistsController@destroyTotal']);
        Route::post('administrador/columnist-deletes/restore/{id}', ['as' => 'administrador.columnist.restore', 'uses' => 'AdminColumnistsController@restore']);

        //COLUMNAS
        Route::get('administrador/columns/{id}', ['as' => 'administrador.columns.list', 'uses' => 'AdminColumnsController@lists']);
        Route::get('administrador/columns/{id}/create', ['as' => 'administrador.columns.create', 'uses' => 'AdminColumnsController@create']);
        Route::post('administrador/columns/{id}/create', ['as' => 'administrador.columns.store', 'uses' => 'AdminColumnsController@store']);
        Route::get('administrador/columns/{id}/show/{idColumn}', ['as' => 'administrador.columns.show', 'uses' => 'AdminColumnsController@show']);
        Route::get('administrador/columns/{id}/edit/{idColumn}', ['as' => 'administrador.columns.edit', 'uses' => 'AdminColumnsController@edit']);
        Route::put('administrador/columns/{id}/edit/{idColumn}', ['as' => 'administrador.columns.update', 'uses' => 'AdminColumnsController@update']);
        Route::delete('administrador/columns/{id}/destroy/{idColumn}', ['as' => 'administrador.columns.destroy', 'uses' => 'AdminColumnsController@destroy']);
        Route::get('administrador/columns/{id}/photos/{idColumn}', ['as' => 'administrador.columns.photoslist', 'uses' => 'AdminColumnsController@photosList' ]);

        //POST
        Route::resource('administrador/posts', 'AdminPostsController');
        Route::get('view/{id}-{url}', ['as' => 'home.noticia.preview', 'uses' => 'FrontendController@noticiaPreview']);

        //HISTORY
        Route::get('administrador/posts/history/{id}', ['as' => 'administrador.post.history', 'uses' => 'AdminPostsController@history']);
        Route::get('administrador/posts-deletes', ['as' => 'administrador.posts.deletes', 'uses' => 'AdminPostsController@listsDeletes']);
        Route::delete('administrador/posts-deletes/destroy/{id}', ['as' => 'administrador.posts.destroyTotal', 'uses' => 'AdminPostsController@destroyTotal']);
        Route::post('administrador/posts-deletes/restore/{id}', ['as' => 'administrador.posts.restore', 'uses' => 'AdminPostsController@restore']);

        //REPORTERO CIUDADANO
        Route::get('administrador/reportero', ['as' => 'administrador.reportero.list', 'uses' => 'AdminPostsController@reporteroList']);

        //GALERIA DE FOTOS DE POST
        Route::get('administrador/posts/photos/{post}', ['as' => 'administrador.post.photoslist', 'uses' => 'AdminPostsController@photosList' ]);
        Route::post('administrador/posts/photos/{post}/order', ['as' => 'administrador.post.photosOrder', 'uses' => 'AdminPostsController@photosOrder' ]);
        Route::get('administrador/posts/photos/{post}/upload', ['as' => 'administrador.post.photosupload', 'uses' => 'AdminPostsController@photosUpload' ]);
        Route::post('administrador/posts/photos/{post}/upload', ['as' => 'administrador.post.photosuploadsave', 'uses' => 'AdminPostsController@photosUploadSave' ]);
        Route::delete('administrador/posts/photos/{post}/delete/{id}', ['as' => 'administrador.post.photosuploadDelete', 'uses' => 'AdminPostsController@photosUploadDelete' ]);
        Route::get('administrador/posts/photos/{post}/edit/{id}', ['as' => 'administrador.post.photosEdit', 'uses' => 'AdminPostsController@photosEdit' ]);
        Route::put('administrador/posts/photos/{post}/edit/{id}', ['as' => 'administrador.post.photosUpdate', 'uses' => 'AdminPostsController@photosUpdate' ]);

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
        Route::post('administrador/profile/data', ['as' => 'administrador.users.profileData', 'uses' => 'AdminUsersController@profileData' ]);
        Route::post('administrador/profile/password', ['as' => 'administrador.users.profilePassword', 'uses' => 'AdminUsersController@profileChangePassword' ]);

        Route::put('administrador/edit/{id}/data', ['as' => 'administrador.users.updateData', 'uses' => 'AdminUsersController@updateData' ]);
        Route::post('administrador/edit/{id}/password', ['as' => 'administrador.users.updatePassword', 'uses' => 'AdminUsersController@updateChangePassword' ]);

        Route::get('administrador/users/reportero/list', ['as' => 'administrador.users.reporteroList', 'uses' => 'AdminUsersController@reporteroList' ]);
        Route::post('administrador/users/reportero/view/{id}', ['as' => 'administrador.users.reporteroView', 'uses' => 'AdminUsersController@reporteroView' ]);

        //ADMIN
        Route::get('administrador', ['as' => 'administrador.index', 'uses' => 'AdminController@show']);
        Route::get('administrador/logout', ['as' => 'administrador.logout', 'uses' => 'AuthController@logout']);

    });

    Route::group(['before' => 'roles:admin-editor-reportero,reportero-ciudadano/admin'], function () {

        Route::get('reportero-ciudadano/logout', ['as' => 'reportero.logout', 'uses' => 'ReporteroController@logout']);

        Route::get('reportero-ciudadano/admin', ['as' => 'reportero.admin.home', 'uses' => 'ReporteroController@home']);

        Route::resource('reportero-ciudadano/posts', 'ReporteroPostsController');

        Route::get('reportero-ciudadano/posts/photos/{post}', ['as' => 'reportero-ciudadano.post.photoslist', 'uses' => 'ReporteroPostsController@photosList' ]);
        Route::get('reportero-ciudadano/posts/photos/{post}/upload', ['as' => 'reportero-ciudadano.post.photosupload', 'uses' => 'ReporteroPostsController@photosUpload' ]);
        Route::post('reportero-ciudadano/posts/photos/{post}/upload', ['as' => 'reportero-ciudadano.post.photosuploadsave', 'uses' => 'ReporteroPostsController@photosUploadSave' ]);
        Route::delete('reportero-ciudadano/posts/photos/{post}/delete/{id}', ['as' => 'reportero-ciudadano.post.photosuploadDelete', 'uses' => 'ReporteroPostsController@photosUploadDelete' ]);

        Route::get('reportero-ciudadano/profile', ['as' => 'reportero-ciudadano.user.profile', 'uses' => 'ReporteroUsersController@profile' ]);
        Route::put('reportero-ciudadano/profile/data', ['as' => 'reportero-ciudadano.user.profileData', 'uses' => 'ReporteroUsersController@profileData' ]);
        Route::put('reportero-ciudadano/profile/social', ['as' => 'reportero-ciudadano.user.profileSocial', 'uses' => 'ReporteroUsersController@profileSocial' ]);
        Route::put('reportero-ciudadano/profile/photo', ['as' => 'reportero-ciudadano.user.profilePhoto', 'uses' => 'ReporteroUsersController@profilePhoto' ]);
        Route::post('reportero-ciudadano/profile/password', ['as' => 'reportero-ciudadano.user.profilePassword', 'uses' => 'ReporteroUsersController@profileChangePassword' ]);

    });

});