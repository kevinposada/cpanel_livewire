<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Articulo;
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
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Product::factory(50)->create();
        Articulo::factory(50)->create();
    }
}
