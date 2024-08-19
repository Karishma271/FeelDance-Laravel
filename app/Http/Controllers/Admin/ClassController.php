<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::whereNull('deleted_at')->get();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $class = new ClassModel();
        $class->class_name = $request->input('class_name');
        $class->class_time = $request->input('class_time');
        $class->video_id = $request->input('video_id');
        $class->save();

        return redirect()->route('admin.classes.index')->with('success', 'Class created successfully');
    }

    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);
        $class->class_name = $request->input('class_name');
        $class->class_time = $request->input('class_time');
        $class->video_id = $request->input('video_id');
        $class->save();

        return redirect()->route('admin.classes.index')->with('success', 'Class updated successfully');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->deleted_at = now();
        $class->save();
        return redirect()->route('admin.classes.index')->with('success', 'Class deleted successfully');
    }
}
