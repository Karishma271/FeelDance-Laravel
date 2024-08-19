<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::whereNull('deleted_at')
                     ->whereNull('allocation_deleted_at')
                     ->get(); 
    return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        $classes = ClassModel::whereNull('deleted_at')->get();
        return view('admin.members.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $member = new Member();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->role = $request->input('role');
        $member->class_id = $request->input('class_id');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/instructors'), $imageName);
            $member->image = $imageName;
        }

        $member->save();
        return redirect()->route('admin.members.index')->with('success', 'Member created successfully');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $classes = ClassModel::whereNull('deleted_at')->get();
        return view('admin.members.edit', compact('member', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->role = $request->input('role');
        $member->class_id = $request->input('class_id');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/instructors'), $imageName);
            $member->image = $imageName;
        }

        $member->save();
        return redirect()->route('admin.members.index')->with('success', 'Member updated successfully');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->deleted_at = now();
        $member->save();
        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully');
    }
}
