<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
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

        User::create(
            [
                'name' => 'ilyas Ezzine',
                'email' => 'ilyas@gmail.com',
                'password' => bcrypt('123456')
            ]
            );
            User::factory(99)->create();
    }
}
