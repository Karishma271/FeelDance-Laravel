@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title">Edit Class</h1>

    <form action="{{ route('admin.classes.update', $class->id) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name:</label>
            <input type="text" class="form-control" id="class_name" name="class_name" value="{{ $class->class_name }}" required>
        </div>
        <div class="mb-3">
            <label for="class_time" class="form-label">Class Time:</label>
            <input type="datetime-local" class="form-control" id="class_time" name="class_time" value="{{ \Carbon\Carbon::parse($class->class_time)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="video_id" class="form-label">YouTube Video ID:</label>
            <input type="text" class="form-control" id="video_id" name="video_id" value="{{ $class->video_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Class</button>
    </form>
</div>
@endsection
