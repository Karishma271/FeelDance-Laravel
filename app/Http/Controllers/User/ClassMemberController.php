<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClassMemberController extends Controller
{
    public function index()
    {
        // Adjust the column names as needed.
        $classMembers = DB::table('members')
            ->leftJoin('classes', 'members.class_id', '=', 'classes.id') // Assuming 'id' is the primary key in 'classes'
            ->whereNull('members.allocation_deleted_at')
            ->whereNull('classes.deleted_at')
            ->whereNotNull('members.class_id')
            ->select('members.id as member_id', 'members.name', 'members.email', 'members.role', 'members.image', 
                     'classes.class_name', 'classes.class_time', 'classes.video_id')
            ->get();

        return view('user.classmember.index', compact('classMembers'));
    }
}
