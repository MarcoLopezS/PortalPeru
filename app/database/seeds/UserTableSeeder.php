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

    }

} 