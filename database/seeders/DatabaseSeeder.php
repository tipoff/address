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
        // \App\Models\User::factory(10)->create();
        app('review')::factory(4)->create();
        app('escaperoom_theme')::factory(5)->create();
        app('market')::factory(4)->create([
            'state_id' => app('state')::find(1),
        ]);
        app('market')::factory(3)->create([
            'state_id' => app('state')::find(2),
        ]);
        app('market')::factory(5)->create([
            'state_id' => app('state')::find(3),
        ]);
    }
}
