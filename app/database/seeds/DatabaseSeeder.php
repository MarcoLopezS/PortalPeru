<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->call('ColumnistTableSeeder');
        $this->call('PostOrderTableSeeder');
        $this->call('PostCategoryTableSeeder');
        $this->call('PostTableSeeder');
	}

}
