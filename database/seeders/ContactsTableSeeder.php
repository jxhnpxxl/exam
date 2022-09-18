<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('contacts')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/contacts.sql'));
        }
    }
}
