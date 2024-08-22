@extends('layouts.app')
@section('title', 'Profile ' . $user->name)
@section('content')
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/picture/' . $user->picture_url) }}" class="rounded-circle mb-2"
                        width="128" height="128">
                    <h5 class="card-title mb-0">{{ $user->name }}</h5>
                    <div class="text-muted mb-2">{{ $user->level->description }}</div>

                    <div>
                        <p>{{ $user->username . ' - ' .  $user->email }}</p>
                        <a href="{{ route('users.profile.edit') }}"
                        class="btn btn-warning"><i
                            data-feather="edit"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
