@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h1 class="admin-title text-center">Manage Classes</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($classes as $class)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">{{ $class->class_name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>Class Time:</strong> {{ \Carbon\Carbon::parse($class->class_time)->format('d-m-Y H:i') }}
                        </p>
                        @if($class->video_id)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $class->video_id }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <p class="text-muted">No Video Available</p>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
