<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'editor', 'reportero']);

            $table->rememberToken();

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('user_profiles', function(Blueprint $table)
        {
        	$table->increments('id');
            
            $table->string('slug_url');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->text('descripcion');

            $table->string('documento_tipo', 100);
            $table->string('documento_numero', 20);
            
            $table->string('telefono', 15);
            $table->string('direccion');
            
            $table->string('imagen');
            $table->string('imagen_carpeta', 100);
            
            $table->string('social_facebook');
            $table->string('social_twitter');
            $table->string('social_google');
            $table->string('social_youtube');
            $table->string('social_pinterest');
            $table->string('social_instagram');
            $table->string('social_linkedin');
            $table->string('social_tumblr');
            
            $table->boolean('activacion');
            $table->string('activacion_codigo', 40);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

        	$table->timestamps();
        	$table->softDeletes();
        });

        Schema::create('tags', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->text('descripcion');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('categories', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->text('descripcion');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('post_orders', function(Blueprint $table)
        {
        	$table->increments('id');

            $table->string('titulo', 100);
            $table->integer('orden')->unsigned();

        	$table->timestamps();
        });

        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');
            $table->text('contenido');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->string('video');
            $table->text('audio');
            $table->string('tags');
            $table->string('redaccion');

            $table->boolean('publicar')->default(false);
            $table->integer('contador')->unsigned();

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('post_order_id')->unsigned();
            $table->foreign('post_order_id')->references('id')->on('post_orders');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('post_photos', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->integer('orden');

            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');
            $table->text('contenido');
            $table->string('imagen');
            $table->string('imagen_carpeta');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('menus', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->integer('object_id');
            $table->enum('type', ['category','page','link']);
            $table->integer('parent_id');
            $table->integer('orden');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });
        
        Schema::create('columnists', function(Blueprint $table)
        {
        	$table->increments('id');
        	
            $table->string('slug_url');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->text('descripcion');

            $table->string('foto');
            $table->string('imagen_portada');

            $table->boolean('publicar');
            $table->smallInteger('orden');

            $table->boolean('dia_lunes');
            $table->boolean('dia_martes');
            $table->boolean('dia_miercoles');
            $table->boolean('dia_jueves');
            $table->boolean('dia_viernes');
            $table->boolean('dia_sabado');
            $table->boolean('dia_domingo');

        	$table->timestamps();
        	$table->softDeletes();	
        });

        Schema::create('columns', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');
            $table->text('contenido');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->string('video');

            $table->boolean('publicar')->default(false);
            $table->integer('contador')->unsigned();

            $table->integer('columnist_id')->unsigned()->nullable();
            $table->foreign('columnist_id')->references('id')->on('columnists');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('galleries', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');
            $table->text('contenido');
            $table->string('imagen');
            $table->string('imagen_carpeta');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('gallery_photos', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->integer('orden');

            $table->integer('gallery_id')->unsigned()->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('configurations', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('dominio');
            $table->string('keywords');
            $table->string('descripcion');
            $table->string('icon');

            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('configurations');
        Schema::drop('gallery_photos');
        Schema::drop('galleries');
        Schema::drop('columns');
        Schema::drop('columnists');
        Schema::drop('menus');
        Schema::drop('pages');
        Schema::drop('post_photos');
        Schema::drop('posts');
        Schema::drop('post_orders');
        Schema::drop('categories');
        Schema::drop('tags');
        Schema::drop('user_profiles');
        Schema::drop('users');
	}

}
