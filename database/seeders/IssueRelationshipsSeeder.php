<?php

namespace Database\Seeders;

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

        foreach ($issues as $issue) {
            $issue->users()->attach($users->random(mt_rand(3,5)));
            $issue->labels()->attach($users->random(mt_rand(1,3)));
        }
    }
}
