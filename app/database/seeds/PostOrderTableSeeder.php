<?php

use PortalPeru\Entities\PostOrder;

class PostOrderTableSeeder extends Seeder {

    public function run()
    {
        PostOrder::create([
            'titulo'    => 'Primero',
            'orden'     => '1'
        ]);

        PostOrder::create([
            'titulo'    => 'Segundo',
            'orden'     => '2'
        ]);

        PostOrder::create([
            'titulo'    => 'Tercero',
            'orden'     => '3'
        ]);

        PostOrder::create([
            'titulo'    => 'Cuarto',
            'orden'     => '4'
        ]);

        PostOrder::create([
            'titulo'    => 'Quinto',
            'orden'     => '5'
        ]);

        PostOrder::create([
            'titulo'    => 'Sexto',
            'orden'     => '6'
        ]);

        PostOrder::create([
            'titulo'    => 'Septimo',
            'orden'     => '7'
        ]);

        PostOrder::create([
            'titulo'    => 'Octavo',
            'orden'     => '8'
        ]);
    }

} 