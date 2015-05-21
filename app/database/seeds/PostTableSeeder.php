<?php

use PortalPeru\Entities\Post;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=100; $i++)
        {
            $titulo = $faker->sentence($nbWords = 8);
            $slug_url = Str::slug($titulo);

            $fecha = $faker->date($format = 'Y-m-d', $max = 'now');
            $hora = $faker->time($format = 'H:i:s', $max = 'now');

            Post::create([
                'titulo'    => $titulo,
                'slug_url'  => $slug_url,
                'descripcion' => $faker->text($maxNbChars = 200),
                'contenido' => $faker->text($maxNbChars = 1000),
                'imagen' => $faker->randomElement($array = ['imagen-1.jpg','imagen-2.jpg','imagen-3.jpg','imagen-4.jpg','imagen-5.jpg']),
                'imagen_carpeta' => 'abril2015/',
                'publicar' => $faker->randomElement($array = ['1']),
                'redaccion' => $faker->name,
                'category_id' => $faker->randomElement($array = [1,3,5,6,7,8]),
                'post_order_id' => $faker->randomElement($array = [1,2,3,4,5,6,7,8]),
                'published_at' => $fecha." ".$hora
            ]);
        }

    }

} 