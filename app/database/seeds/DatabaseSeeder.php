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

        $this->call('ConfigTableSeeder');
		$this->call('UserTableSeeder');
        $this->call('UserReporteroTableSeeder');
        $this->call('ColumnistTableSeeder');
        $this->call('ColumnsTableSeeder');
        $this->call('PostOrderTableSeeder');
        $this->call('PostCategoryTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('GalleryTableSeeder');
	}

}
