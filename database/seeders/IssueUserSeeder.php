<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Issue;
use Illuminate\Database\Seeder;

class IssueUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $issues = Issue::pluck('id');

        foreach ($users as $user) {
            $user->issues()->attach($issues->random(mt_rand(3,5)));
        }
    }
}
