<?php

use PortalPeru\Entities\Column;
use Faker\Factory as Faker;

class ColumnsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=200; $i++)
        {
            $titulo = $faker->sentence($nbWords = 8);
            $slug_url = Str::slug($titulo);

            $fecha = $faker->date($format = 'Y-m-d', $max = 'now');
            $hora = $faker->time($format = 'H:i:s', $max = 'now');

            Column::create([
                'titulo'    => $titulo,
                'slug_url'  => $slug_url,
                'descripcion' => $faker->text($maxNbChars = 200),
                'contenido' => $faker->text($maxNbChars = 2500),
                'imagen' => $faker->randomElement($array = ['imagen-1.jpg','imagen-2.jpg','imagen-3.jpg','imagen-4.jpg','imagen-5.jpg']),
                'imagen_carpeta' => 'abril2015/',
                'publicar' => '1',
                'columnist_id' => $faker->randomElement($array = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15']),
                'published_at' => $fecha." ".$hora
            ]);
        }

    }

} 