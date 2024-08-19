@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title">Add Class</h1>

    <form action="{{ route('admin.classes.store') }}" method="POST" class="admin-form">
        @csrf
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name:</label>
            <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <div class="mb-3">
            <label for="class_time" class="form-label">Class Time:</label>
            <input type="datetime-local" class="form-control" id="class_time" name="class_time" required>
        </div>
        <div class="mb-3">
            <label for="video_id" class="form-label">YouTube Video ID:</label>
            <input type="text" class="form-control" id="video_id" name="video_id" placeholder="Enter YouTube Video ID">
        </div>
        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
</div>
@endsection
