@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Assigned Class Members</h1>

    @if($classMembers->isEmpty())
        <p class="text-center">No assigned members found.</p>
    @else
        <div class="row">
            @foreach($classMembers as $member)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body text-center">
                            <div class="avatar mb-4">
                                @if($member->image && file_exists(public_path('images/instructors/' . $member->image)))
                                    <img src="{{ asset('images/instructors/' . $member->image) }}" alt="Member Image" class="img-fluid rounded-circle">
                                @else
                                    <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image" class="img-fluid rounded-circle">
                                @endif
                            </div>
                            <h5 class="card-title font-weight-bold">{{ $member->name }}</h5>
                            <p class="card-text text-muted">{{ $member->email }}</p>
                            <p class="card-text"><strong>Role:</strong> {{ ucfirst($member->role) }}</p>
                            <p class="card-text"><strong>Class:</strong> {{ $member->class_name ?? 'No Class Assigned' }}</p>
                            <p class="card-text"><strong>Class Time:</strong> {{ $member->class_time ? \Carbon\Carbon::parse($member->class_time)->format('d-m-Y H:i') : 'No Time Available' }}</p>
                            @if($member->video_id)
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $member->video_id }}" allowfullscreen></iframe>
                                </div>
                            @else
                                <p class="text-muted">No Video Available</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
