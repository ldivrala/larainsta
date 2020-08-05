@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('profile.show', $post->user->profile) }}"><img
                                src="{{ asset('storage/' . $post->image) }}" class="w-100">
                        </a> </div>
                    <div>
                        <div class="d-flex mt-2 mb-4 align-items-center">
                            <div><a href="{{ route('profile.show', $post->user->profile) }}">
                                    <h5 class="text-dark font-weight-bold"> {{ $post->user->username }}</h5>
                                </a></div>
                            <div class="pl-2 pb-2"> {{ $post->caption }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div>
            <div class="col-md-12 d-flex justify-content-center">
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-3">
            @foreach($profiles as $profile)
                @cannot('update',$profile)
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('profile.show', $profile->id) }}"> <img
                            src="{{ asset($profile->profileImage()) }}" class="w-100 rounded-circle"
                            style="max-height:40px; width:auto !important"> </a>
                    <div class="px-3">
                        <div><a href="{{ route('profile.show', $profile->id) }}">
                                <h5 class="text-dark font-weight-bold"> {{ $profile->user->username }}</h5>
                            </a></div>
                    </div>
                </div>
                @endcannot
            @endforeach
        </div>
    </div>
@endsection
