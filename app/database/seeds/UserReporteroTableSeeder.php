<?php

use PortalPeru\Entities\User;
use PortalPeru\Entities\UserProfile;
use Faker\Factory as Faker;

class UserReporteroTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=10; $i<=100; $i++)
        {
            $nombre = $faker->name;
            $apellidos = $faker->lastName;
            $titulo = $nombre." ".$apellidos;
            $slug_url = Str::slug($titulo);

            User::create([
                'id'        => $i,
                'email'     => $faker->email,
                'password'  => $faker->password,
                'type'      => 'reportero',
                'activacion'=> $faker->randomElement($array = ['0','1'])
            ]);

            UserProfile::create([
                'nombre'        => $nombre,
                'apellidos'     => $apellidos,
                'slug_url'      => $slug_url,
                'descripcion'   => $faker->text($maxNbChars = 200),
                'user_id'       => $i
            ]);
        }
    }
} 