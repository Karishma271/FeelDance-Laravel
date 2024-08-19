@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title text-center">Assign Member to a Class</h1>

    <form action="{{ route('admin.allocations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="member_id" class="form-label">Select Member:</label>
            <select class="form-select" id="member_id" name="member_id" required>
                <option value="" disabled selected>Choose a member</option>
                @foreach($members as $member)
                <option value="{{ $member->member_id }}">{{ $member->name }} ({{ $member->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Assign to Class:</label>
            <select class="form-select" id="class_id" name="class_id" required>
                <option value="" disabled selected>Choose a class</option>
                @foreach($classes as $class)
                <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-admin-primary">Assign Member</button>
    </form>
</div>
@endsection
