<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_videos', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('titulo');
            $table->text('descripcion');
            $table->string('video');

            $table->integer('orden');

            $table->integer('post_id');
            $table->integer('user_id');

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
		Schema::drop('post_videos');
	}

}
