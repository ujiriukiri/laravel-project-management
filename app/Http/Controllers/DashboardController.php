<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $project_count = Project::count();
        $issues = Issue::all();
        $open_issues = [];
        $closed_issues = [];
        $issues->each(function ($issue) use (&$open_issues, &$closed_issues) {
            $issue->status == 1 ? array_push($open_issues, $issue) : array_push($closed_issues, $issue);
        });

        return view('dashboard', [
            'project_count' => $project_count,
            'open_issues' => count($open_issues),
            'closed_issues' => count($closed_issues)
        ]);
    }
}
