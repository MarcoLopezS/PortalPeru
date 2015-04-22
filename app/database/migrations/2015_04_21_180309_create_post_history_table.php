<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_histories', function(Blueprint $table)
		{
			$table->increments('id');

			$table->enum('type', ['update', 'restore', 'delete']):

			$table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_histories');
	}

}
