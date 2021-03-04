<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $projects_count = Project::count();
        $users_count = User::count();
        $issues = Issue::all();
        $open_issues = [];
        $closed_issues = [];
        $issues->each(function ($issue) use (&$open_issues, &$closed_issues) {
            $issue->status == 1 ? array_push($open_issues, $issue) : array_push($closed_issues, $issue);
        });

        return view('dashboard', [
            'projects_count' => $projects_count,
            'users_count' => $users_count,
            'open_issues' => count($open_issues),
            'closed_issues' => count($closed_issues)
        ]);
    }
}
