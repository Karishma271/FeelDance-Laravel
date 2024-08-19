@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Assigned Class Members</h1>

    @if($classMembers->isEmpty())
        <p>No assigned members found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Class Name</th>
                        <th>Class Time</th>
                        <th>Class Video</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ ucfirst($member->role) }}</td>
                        <td>
                            @if($member->image && file_exists(public_path('images/instructors/' . $member->image)))
                                <img src="{{ asset('images/instructors/' . $member->image) }}" alt="Member Image" class="img-thumbnail" style="width:100px;height:100px;">
                            @else
                                <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image" class="img-thumbnail" style="width:100px;height:100px;">
                            @endif
                        </td>
                        <td>{{ $member->class_name ?? 'No Class' }}</td>
                        <td>{{ $member->class_time ? date('d-m-Y H:i', strtotime($member->class_time)) : 'No Time' }}</td>
                        <td>
                        @if($member->video_id)
                            <div class="ratio ratio-16x9" style="max-width: 200px;">
                                <iframe src="https://www.youtube.com/embed/{{ $member->video_id }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @else
                            <span class="text-muted">No Video</span>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
