<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stages = [
            'To do', 'In Progress', 'Done'
        ];

        foreach ($stages as $stage) {
            \App\Models\Stage::factory()->create([
                'name' => $stage
            ]);
        }
    }
}
