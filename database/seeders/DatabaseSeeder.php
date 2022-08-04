<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rol;
use App\Models\usuario;
use App\Models\configuration;
use App\Models\Partido;
use App\Models\Pista;
use App\Models\theme;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        configuration::factory(1)->create();
        theme::factory(1)->create();
        rol::factory(10)->create();
        usuario::factory(100)->create();
        Pista::factory(5)->create();
        Partido::factory(100)->create();
    }
}
