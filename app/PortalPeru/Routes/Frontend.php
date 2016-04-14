<?php

/* FRONTEND */
Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@home']);

/* CONTACTO */
Route::get('nosotros', ['as' => 'home.nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('contacto', ['as' => 'home.contacto', 'uses' => 'FrontendController@contacto']);
Route::get('publicidad', ['as' => 'home.publicidad', 'uses' => 'FrontendController@publicidad']);

//LIMA EN UNA FOTO
Route::get('lima-foto/{url}', ['as' => 'home.fotos.lima', 'uses' => 'FrontendController@fotosLima']);
Route::get('lima-foto', ['as' => 'home.fotos.lima.all', 'uses' => 'FrontendController@fotosLimaAll']);

/* BUSCADOR */
Route::get('buscar/b={texto}', ['as' => 'home.buscar', 'uses' => 'FrontendController@buscar']);

/* COLUMNISTAS */
Route::get('columnistas', ['as' => 'home.columnistas.list', 'uses' => 'FrontendController@columnistasList']);
Route::get('columnistas/{id}-{url}', ['as' => 'home.columnistas.person', 'uses' => 'FrontendController@columnistasPerson']);
Route::get('columnistas/{id}-{url}/{idColumn}-{urlColumn}', ['as' => 'home.columnistas.column', 'uses' => 'FrontendController@columnistasColumn']);

/* NOTICIAS */
Route::get('nota/{id}-{url}', ['as' => 'home.noticia', 'uses' => 'FrontendController@noticia']);
Route::get('tag/{id}-{url}', ['as' => 'home.noticia.tags', 'uses' => 'FrontendController@noticiaTags']);
Route::get('{url}', ['as' => 'home.noticia.categoria', 'uses' => 'FrontendController@noticiaCategoria']);