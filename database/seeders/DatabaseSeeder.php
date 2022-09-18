<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\ContactsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\TeamsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Only seeders that are used for production can include below
        $this->call([
            ContactsTableSeeder::class,
            UsersTableSeeder::class,
            TeamsTableSeeder::class,
        ]);

        Model::reguard();
    }
}
