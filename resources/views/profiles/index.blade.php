@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mx-5" style="width: 60rem">
            <div class="row py-3 mx-5">
                <div class="col-4 p-4">
                    <img src="{{ asset($user->profile->profileImage()) }}" class="rounded-circle" height="140px">
                </div>

                <div class="col-8">
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="d-flex pb-2">
                            <h3>{{ $user->username }}</h3>
                            @cannot('update', $user->profile)
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endcannot
                        </div>
                        @can('update', $user->profile)
                            <a href="/p/create">Add New Post</a>
                        @endcan



                    </div>
                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan

                    <div class="d-flex">
                        <div class="pr-4"><strong>{{ $posts }}</strong> posts</div>
                        <div class="pr-4"><strong>{{ $followers }}</strong> followers</div>
                        <div><strong>{{ $following }}</strong> following</div>
                    </div>
                    <div>{{ $user->profile->title }}</div>
                    <div class="py-3">{{ $user->profile->description }}</div>
                    <div class=""><a href="">{{ $user->profile->url }}</a></div>
                </div>
                <hr>

                <div class="row py-4">
                    @foreach($user->posts as $post)
                        <div class="col-4 pb-3">
                            <a href="/p/{{ $post->id }}">
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-100">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
