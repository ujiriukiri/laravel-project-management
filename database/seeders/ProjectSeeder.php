<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Project::factory(2)
                            ->hasIssues(mt_rand(5,10), [
                                'stage_id' => mt_rand(1, 3)
                            ])
                            ->create();
    }
}
