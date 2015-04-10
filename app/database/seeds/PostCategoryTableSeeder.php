<?php

use PortalPeru\Entities\Category;

class PostCategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::create([
            'titulo' => 'Hechos',
            'slug_url' => 'hechos',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Entrevista',
            'slug_url' => 'entrevista',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Mira el Perú',
            'slug_url' => 'mira-el-peru',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Bicentenario',
            'slug_url' => 'bicentenario',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Reportero Ciudadano',
            'slug_url' => 'reportero-ciudadano',
            'publicar' => 1
        ]);
    }

} 