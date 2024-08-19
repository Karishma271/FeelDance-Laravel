@extends('layouts.admin')

@section('content')
<div class="container admin-container">
    <h1 class="admin-title text-center">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Members</h5>
                    <p class="card-text display-4">{{ $totalMembers }}</p>
                    <a href="{{ route('admin.members.index') }}" class="btn btn-admin-primary">View Members</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Classes</h5>
                    <p class="card-text display-4">{{ $totalClasses }}</p>
                    <a href="{{ route('admin.classes.index') }}" class="btn btn-admin-primary">View Classes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quick Actions</h5>
                    <a href="{{ route('admin.members.create') }}" class="btn btn-admin-primary mb-2">Add New Member</a>
                    <a href="{{ route('admin.classes.create') }}" class="btn btn-admin-primary mb-2">Add New Class</a>
                    <a href="{{ route('admin.allocations.index') }}" class="btn btn-admin-primary">Assign Member to Class</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Activity</h5>
                    <ul class="list-group">
                        @foreach($recentMembers as $member)
                            <li class="list-group-item">
                                Last member added: {{ $member->name ?? 'Unknown' }} at {{ \Carbon\Carbon::parse($member->created_at)->format('Y-d-m H:i') }}
                            </li>
                        @endforeach
                        @foreach($recentClasses as $class)
                            <li class="list-group-item">
                                Last class created: {{ $class->class_name ?? 'Unknown Class' }} at {{ \Carbon\Carbon::parse($class->class_time ?? $class->created_at)->format('Y-d-m H:i') }}
                            </li>
                        @endforeach
                        @foreach($recentAssignments as $assignment)
                            <li class="list-group-item">
                                Last assignment: {{ $assignment->name ?? 'Unknown Assignment' }} to {{ $assignment->class->class_name ?? 'Unknown Class' }} at {{ \Carbon\Carbon::parse($assignment->created_at ?? $assignment->updated_at)->format('Y-d-m H:i') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
