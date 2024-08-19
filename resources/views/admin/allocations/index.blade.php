@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title text-center mb-5">Member Management</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        @foreach($members as $member)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <div class="avatar mb-4">
                        @if($member->image)
                            <img src="{{ asset('images/instructors/'.$member->image) }}" alt="Member Image" class="img-fluid rounded-circle">
                        @else
                            <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image" class="img-fluid rounded-circle">
                        @endif
                    </div>
                    <h5 class="card-title font-weight-bold">{{ $member->name }}</h5>
                    <p class="card-text text-muted">{{ $member->email }}</p>
                    <p class="card-text"><strong>Role:</strong> {{ ucfirst($member->role) }}</p>
                    <p class="card-text"><strong>Class:</strong> {{ $member->class ? $member->class->class_name : 'No class assigned' }}</p>
                    <p class="card-text"><strong>Class Time:</strong> {{ $member->class ? \Carbon\Carbon::parse($member->class->class_time)->format('d-m-Y H:i') : 'N/A' }}</p>
                    <div class="d-flex justify-content-center mt-3">
                        @if(!$member->class)
                            <a href="{{ route('admin.allocations.create', $member->id) }}" class="btn btn-admin-primary btn-sm mx-1">Assign to a class</a>
                        @else
                            <button class="btn btn-secondary btn-sm mx-1" disabled>Assigned</button>
                        @endif
                        <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-admin-primary btn-sm mx-1">Edit</a>
                        <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');" class="mx-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-admin-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
