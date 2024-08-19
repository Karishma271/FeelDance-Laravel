{{-- resources/views/user/classes/index.blade.php --}}

@extends('layouts.user')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Our Classes</h1>

        <div class="row">
            @foreach($classes as $class)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $class->class_name }}</h5>
                            <p class="card-text">
                                <strong>Time:</strong> {{ \Carbon\Carbon::parse($class->class_time)->format('d-m-Y H:i') }}
                            </p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
