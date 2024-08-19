@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h1 class="admin-title text-center">Manage Members</h1>
    <a href="{{ route('admin.members.create') }}" class="btn btn-primary mb-4">Add New Member</a>

    <div class="row">
        @foreach($members as $member)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">{{ $member->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Email:</strong> {{ $member->email }}</p>
                        <p class="card-text"><strong>Role:</strong> {{ ucfirst($member->role) }}</p>
                        <p class="card-text"><strong>Class:</strong> {{ $member->class->class_name ?? 'No Class Assigned' }}</p>
                        @if($member->image)
                            <div class="text-center">
                                <img src="{{ asset('images/instructors/'.$member->image) }}" alt="Member Image" class="img-thumbnail" style="width:100px;height:100px;">
                            </div>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image Available" class="img-thumbnail" style="width:100px;height:100px;">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');" style="display:inline;">
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
