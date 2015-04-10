<?php

use PortalPeru\Entities\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'email'     => 'admin@portalperu.pe',
            'password'  => 'adminperu$',
            'type'      => 'admin'
        ]);

        User::create([
            'email'     => 'jdelacruz@portalperu.pe',
            'password'  => 'jdelacruz@peru',
            'type'      => 'admin'
        ]);

        User::create([
            'email'     => 'vtipe@portalperu.pe',
            'password'  => 'vtipe@peru',
            'type'      => 'editor'
        ]);

        User::create([
            'email'     => 'jtipe@portalperu.pe',
            'password'  => 'jtipe@peru',
            'type'      => 'editor'
        ]);

        User::create([
            'email'     => 'rguerrero@portalperu.pe',
            'password'  => 'rguerrero@peru',
            'type'      => 'editor'
        ]);

        User::create([
            'email'     => 'jperez@portalperu.pe',
            'password'  => 'jperez@peru',
            'type'      => 'editor'
        ]);

    }

} 