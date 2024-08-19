@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title text-center">Edit Member</h1>
    <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role:</label>
            <select class="form-select" id="role" name="role" required>
                <option value="Student" {{ $member->role == 'Student' ? 'selected' : '' }}>Student</option>
                <option value="Instructor" {{ $member->role == 'Instructor' ? 'selected' : '' }}>Instructor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Assign to Class:</label>
            <select class="form-select" id="class_id" name="class_id" required>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $member->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($member->image)
            <img src="{{ asset('images/instructors/'.$member->image) }}" alt="Member Image" class="img-thumbnail" style="width:100px;height:100px;">
            @endif
        </div>
        <button type="submit" class="btn btn-admin-primary">Update Member</button>
    </form>
</div>
@endsection
