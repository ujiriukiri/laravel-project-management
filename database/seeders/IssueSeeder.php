<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Issue::factory(22)->create([
            'project_id' => mt_rand(1, 2),
            'stage_id' => mt_rand(1, 3)
        ]);
    }
}
