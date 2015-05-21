<?php

use PortalPeru\Entities\Category;

class PostCategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::create([
            'id'    => 1,
            'titulo' => 'Hechos',
            'slug_url' => 'hechos',
            'publicar' => 1
        ]);

        Category::create([
            'id'    => 3,
            'titulo' => 'Entrevista',
            'slug_url' => 'entrevista',
            'publicar' => 1
        ]);

        Category::create([
            'id'    => 5,
            'titulo' => 'Mira el Perú',
            'slug_url' => 'mira-el-peru',
            'publicar' => 1
        ]);

        Category::create([
            'id'    => 6,
            'titulo' => 'Reportero Ciudadano',
            'slug_url' => 'reportero-ciudadano',
            'publicar' => 1
        ]);

        Category::create([
            'id'    => 7,
            'titulo' => 'Bicentenario',
            'slug_url' => 'bicentenario',
            'publicar' => 1
        ]);        

        Category::create([
            'id'    => 8,
            'titulo' => 'Tecnología',
            'slug_url' => 'tecnologia',
            'publicar' => 1
        ]);
    }

} 