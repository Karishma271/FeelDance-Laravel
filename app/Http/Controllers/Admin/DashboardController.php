<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch total counts
        $totalMembers = Member::whereNull('deleted_at')->count();
        $totalClasses = ClassModel::whereNull('deleted_at')->count();

        // Fetch recent activities
        $recentMembers = Member::whereNull('deleted_at')->orderBy('created_at', 'desc')->limit(1)->get();
        $recentClasses = ClassModel::whereNull('deleted_at')->orderBy('created_at', 'desc')->limit(1)->get();
        $recentAssignments = Member::with('class')
            ->whereNull('deleted_at')
            ->whereNull('allocation_deleted_at')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        return view('admin.dashboard', compact('totalMembers', 'totalClasses', 'recentMembers', 'recentClasses', 'recentAssignments'));
    }
}
