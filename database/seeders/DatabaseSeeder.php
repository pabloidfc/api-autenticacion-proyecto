<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            "ci"     => "12345678",
            "nombre" => "admin",
            "email"  => "admin@admin.com"
        ]);

        \App\Models\Administrador::factory(1)->create();
        \App\Models\Ubicacion::factory(1)->create();
        \App\Models\Telefono::factory(1)->create();
    }
}
