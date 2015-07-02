<?php

use PortalPeru\Entities\Tag;
use Faker\Factory as Faker;

class TagTableSeeder extends Seeder {

    public function run()
    {
        Tag::insert(
            [
                ['titulo' => 'Alan Garcia', 'slug_url' => 'alan-garcia', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Alejandro Toledo', 'slug_url' => 'alejadnro-toledo', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Nadine Heredia', 'slug_url' => 'nadine-heredia', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Ciclismo', 'slug_url' => 'ciclismo', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Orange Bike', 'slug_url' => 'orange-bike', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Rutas', 'slug_url' => 'rutas', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Perú', 'slug_url' => 'peru', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Estados Unidos', 'slug_url' => 'estados-unidos', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Copa America 2015', 'slug_url' => 'copa-america-2015', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Argentina', 'slug_url' => 'argentina', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Colombia', 'slug_url' => 'colombia', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Chile', 'slug_url' => 'chile', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Uruguay', 'slug_url' => 'uruguay', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Miguel Grau', 'slug_url' => 'miguel-grau', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Lima', 'slug_url' => 'lima', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Luis Castañeda', 'slug_url' => 'luis-castañeda', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Susana Villaran', 'slug_url' => 'susana-villaran', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Municipalidad', 'slug_url' => 'municipalidad', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Chosica', 'slug_url' => 'chosica', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Huaral', 'slug_url' => 'huaral', 'publicar' => 1, 'user_id' => 1],
                ['titulo' => 'Sayan', 'slug_url' => 'sayan', 'publicar' => 1, 'user_id' => 1]
            ]
        );

    }

} 