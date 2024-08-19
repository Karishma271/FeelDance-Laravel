<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    public function index()
    {
        $members = Member::with('class')
            ->whereNull('deleted_at')
            ->whereNull('allocation_deleted_at')
            ->get();
        
        return view('admin.allocations.index', compact('members'));
    }

    public function create()
    {
        $classes = ClassModel::whereNull('deleted_at')->get();
        $members = Member::whereNull('deleted_at')->get();
        
        return view('admin.allocations.create', compact('classes', 'members'));
    }

    public function store(Request $request)
    {
        $member = Member::findOrFail($request->member_id);
        $member->class_id = $request->class_id;
        $member->save();

        return redirect()->route('admin.allocations.index')->with('success', 'Member assigned to class successfully!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $classes = ClassModel::whereNull('deleted_at')->get();

        return view('admin.allocations.edit', compact('member', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->class_id = $request->class_id;
        $member->save();

        return redirect()->route('admin.allocations.index')->with('success', 'Allocation updated successfully!');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->allocation_deleted_at = now();
        $member->save();

        return redirect()->route('admin.allocations.index')->with('success', 'Allocation deleted successfully!');
    }
}
