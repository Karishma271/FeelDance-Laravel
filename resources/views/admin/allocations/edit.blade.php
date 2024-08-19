@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title text-center">Edit Member Allocation</h1>

    <form action="{{ route('admin.allocations.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="member_name" class="form-label">Member Name:</label>
            <input type="text" class="form-control" id="member_name" value="{{ $member->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Assign to Class:</label>
            <select class="form-select" id="class_id" name="class_id" required>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $member->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-admin-primary">Update Allocation</button>
    </form>
</div>
@endsection
