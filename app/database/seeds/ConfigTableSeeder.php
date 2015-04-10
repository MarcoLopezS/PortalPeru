<?php

use PortalPeru\Entities\Configuration;

class ConfigTableSeeder extends Seeder {

    public function run()
    {
        Configuration::create([
            'titulo' => 'Portal Perú',
            'dominio' => 'http://portalperu.app'
        ]);

    }

} 