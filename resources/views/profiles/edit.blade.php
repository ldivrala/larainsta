@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container">
            <h2>Edit Profile</h2>
        </div>

        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="title" class="col-form-label"> Title</label>

                <div class="col-md-8">
                    <input id="title" type="text" class="form-control" @error('title') is-invalid @enderror name="title"
                        value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus id="title">

                    @error('title')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-form-label"> Description</label>

                <div class="col-md-8">
                    <input id="description" type="text" class="form-control" @error('description') is-invalid @enderror
                        name="description" value="{{ old('description') ?? $user->profile->description }}"
                        autocomplete="description" autofocus>

                    @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-form-label"> Url</label>

                <div class="col-md-8">
                    <input id="url" type="text" class="form-control" @error('url') is-invalid @enderror name="url"
                        value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                    @error('url')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-form-label">Profile Image</label>
                <input type="file" id="image" name="image" @error('image') is-invalid @enderror
                    class="form-control-file">

                @error('image')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</xbutton>
        </div>
    </form>
</div>

@endsection
