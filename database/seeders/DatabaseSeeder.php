<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rol;
use App\Models\usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        rol::factory(5)->create();
        usuario::factory(100)->create();
    }
}
