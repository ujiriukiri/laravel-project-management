<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ['Bug', 'Enhancement', 'Fix', 'Invalid', 'help', 'Good First Issue'];
        
        foreach ($labels as $label) {
            Label::factory()->create([
                'title' => Str::lower($label)
            ]);
        }
    }
}
