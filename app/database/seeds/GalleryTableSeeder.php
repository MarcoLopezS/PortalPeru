<?php

use PortalPeru\Entities\Gallery;
use Faker\Factory as Faker;

class GalleryTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=100; $i++)
        {
            $titulo = $faker->sentence($nbWords = 8);
            $slug_url = Str::slug($titulo);

            $fecha = $faker->date($format = 'Y-m-d', $max = 'now');
            $hora = $faker->time($format = 'H:i:s', $max = 'now');

            Gallery::create([
                'titulo'    => $titulo,
                'slug_url'  => $slug_url,
                'descripcion' => $faker->name,
                'imagen' => $faker->randomElement($array = ['imagen-1.jpg','imagen-2.jpg','imagen-3.jpg','imagen-4.jpg','imagen-5.jpg','imagen-6.jpg','imagen-7.jpg']),
                'imagen_carpeta' => 'mayo2015/',
                'publicar' => $faker->randomElement($array = ['0','1']),
                'published_at' => $fecha." ".$hora
            ]);
        }

    }

} 