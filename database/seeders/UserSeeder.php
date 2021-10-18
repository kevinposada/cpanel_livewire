<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin123')
        ])->assignRole('admin');

        User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'username' => 'client',
            'password' => bcrypt('admin123')
        ])->assignRole('client');

        User::create([
            'name' => 'creator',
            'email' => 'creator@gmail.com',
            'username' => 'creator',
            'password' => bcrypt('admin123')
        ])->assignRole('creator');

        User::create([
            'name' => 'kevin',
            'email' => 'posada772@gmail.com',
            'username' => 'kevin',
            'password' => bcrypt('admin123')
        ])->assignRole('admin')->createAsStripeCustomer();

        User::factory(7)->create();
    }
}
