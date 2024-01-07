@extends('templates/dashboard')
@section('content')
    <div class="my-4 mt-5 py-3 px-5 shadow-sm">
        <div class="row">
            <div class="col-md-3 mb-3">
                <img src="{{ asset('storage/' . $user->image) }}" style="width: 100%" class="rounded-circle" alt="{{ $user->name }}">
            </div>
            <div class="col-md-9 mb-3 align-self-center"">
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-user text-primary me-2"></i> {{ $user->name }}
                </div>
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-envelope text-primary me-2"></i> {{ $user->email }}
                </div>
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-at text-primary me-2"></i> {{ $user->username }}
                </div>
                <div class="border-bottom p-2 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Active since">
                    <i class="fas fa-calendar-alt text-primary me-2"></i> {{ date('d F Y', strtotime($user->created_at)) }}
                </div>
                <a href="/dashboard/users/{{ $user->id }}/edit" class="btn float-end text-white bg-primary"><i class="fas fa-pencil-alt me-1"></i> Edit Profile</a>
            </div>
        </div>
    </div>
@endsection