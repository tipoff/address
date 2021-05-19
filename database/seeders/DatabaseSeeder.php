<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Tipoff\Reviews\Models\Review;

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
        Review::factory(4)->create();
    }
}
