<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Issue;
use App\Models\Label;
use Illuminate\Database\Seeder;

class IssueRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issues = Issue::all();
        $users = User::pluck('id');
        $users = Label::pluck('id');

        $faker = Factory::create('en_NG');

        foreach ($issues as $issue) {
            if($faker->randomElement([0,1,1,1,1])) {
                $issue->users()->attach($users->random(mt_rand(1,3)));
            }
            $issue->labels()->attach($users->random(mt_rand(1,3)));
        }
    }
}
