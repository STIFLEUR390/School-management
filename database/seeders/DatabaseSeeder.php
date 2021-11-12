<?php

namespace Database\Seeders;

use App\Models\SchoolInformation;
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
        SchoolInformation::factory(1)->create();
    }
}
