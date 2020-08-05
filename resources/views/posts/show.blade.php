@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    <div class="col-8">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100">
                    </div>
                    <div class="col-4 mt-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $post->user->profile->image) }}" class="w-100 rounded-circle"
                                style="max-height:40px; width:auto !important">

                            <div class="px-3">
                                <h6> {{ $post->user->username }} </h6>
                            </div>
                        </div>
                        <div class="d-flex pt-3 align-items-center">
                            <div><a href="{{ route('profile.show', $post->user->profile) }}">
                                    <h5 class="text-dark font-weight-bold"> {{ $post->user->username }}</h5>
                                </a></div>
                            <div class="pl-2 mb-2"> {{ $post->caption }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
