<?php

/* FRONTEND */

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@construccion']);
Route::get('nota/{id}-{url}', ['as' => 'home.noticia', 'uses' => 'FrontendController@noticia']);
Route::get('seccion/{url}', ['as' => 'home.noticia.categoria', 'uses' => 'FrontendController@noticiaCategoria']);
Route::get('buscar/b={texto}', ['as' => 'home.buscar', 'uses' => 'FrontendController@buscar']);
Route::get('columnistas', ['as' => 'home.columnistas.list', 'uses' => 'FrontendController@columnistasList']);
Route::get('columnistas/{id}-{url}', ['as' => 'home.columnistas.person', 'uses' => 'FrontendController@columnistasPerson']);
Route::get('columnistas/{id}-{url}/{idColumn}-{urlColumn}', ['as' => 'home.columnistas.column', 'uses' => 'FrontendController@columnistasColumn']);