<?php

use PortalPeru\Entities\Category;

class PostCategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::create([
            'titulo' => 'Noticia',
            'slug_url' => 'noticia',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Informe',
            'slug_url' => 'informe',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Entrevista',
            'slug_url' => 'entrevista',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Portal TV',
            'slug_url' => 'portal-tv',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Mira el Perú',
            'slug_url' => 'mira-el-peru',
            'publicar' => 1
        ]);

        Category::create([
            'titulo' => 'Reportero Ciudadano',
            'slug_url' => 'reportero-ciudadano',
            'publicar' => 1
        ]);
    }

} 