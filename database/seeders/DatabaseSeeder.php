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
        \App\Models\User::factory(10)->create();
        $this->call(ProjectSeeder::class);
        $this->call(StageSeeder::class);
        $this->call(IssueSeeder::class);
        $this->call(LabelSeeder::class);
        $this->call(IssueRelationshipsSeeder::class);
    }
}
