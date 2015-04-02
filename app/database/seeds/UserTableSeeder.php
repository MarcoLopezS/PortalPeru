<?php

use PortalPeru\Entities\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'email'     => 'marcolopez49@hotmail.com',
            'password'  => '123456',
            'type'      => 'admin'
        ]);
    }

} 