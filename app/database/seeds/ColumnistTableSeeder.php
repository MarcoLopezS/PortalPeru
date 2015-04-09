<?php

use PortalPeru\Entities\Columnist;
use Faker\Factory as Faker;

class ColumnistTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=15; $i++)
        {
            $nombre = $faker->name;
            $apellidos = $faker->lastName;
            $titulo = $nombre." ".$apellidos;
            $slug_url = Str::slug($titulo);

            Columnist::create([
                'nombre'    => $nombre,
                'apellidos'  => $apellidos,
                'slug_url' => $slug_url,
                'descripcion' => $faker->text($maxNbChars = 200),
                'foto' => $faker->randomElement($array = ['imagen-1.jpg','imagen-2.jpg','imagen-3.jpg','imagen-4.jpg','imagen-5.jpg']),
                'imagen_portada' => $faker->randomElement($array = ['imagen-6.jpg','imagen-7.jpg','imagen-8.jpg','imagen-9.jpg','imagen-10.jpg']),
                'publicar' => $faker->randomElement($array = ['0','1']),
                'dia_lunes' => $faker->randomElement($array = ['0','1']),
                'dia_martes' => $faker->randomElement($array = ['0','1']),
                'dia_miercoles' => $faker->randomElement($array = ['0','1']),
                'dia_jueves' => $faker->randomElement($array = ['0','1']),
                'dia_viernes' => $faker->randomElement($array = ['0','1']),
                'dia_sabado' => $faker->randomElement($array = ['0','1']),
                'dia_domingo' => $faker->randomElement($array = ['0','1'])
            ]);
        }

    }

} 