<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesignPortadaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->boolean('design'); //0 = Normal - 1 = Portada
			$table->string('logo');
			$table->string('imagen');
			$table->string('imagen_carpeta');
			$table->string('imagen_descripcion');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->dropColumn(['design', 'logo', 'imagen', 'imagen_carpeta', 'imagen_descripcion']);
		});
	}

}
