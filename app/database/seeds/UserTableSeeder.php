<?php

use PortalPeru\Entities\User;
use PortalPeru\Entities\UserProfile;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'id'        => 1,
            'email'     => 'admin@portalperu.pe',
            'password'  => 'admin',
            'type'      => 'admin',
            'activacion' => 1
        ]);

        UserProfile::create([
            'nombre'        => 'Marco',
            'apellidos'     => 'Lopez',
            'user_id'       => 1
        ]);

        User::create([
            'id'        => 2,
            'email'     => 'editor@portalperu.pe',
            'password'  => 'editor',
            'type'      => 'editor',
            'activacion' => 1
        ]);

        UserProfile::create([
            'nombre'        => 'Editor',
            'apellidos'     => 'Lopez',
            'user_id'       => 2
        ]);

    }

} 