@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="caption" class="col-form-label">Post Caption</label>

                <div class="col-md-8">
                    <input id="caption" type="text" class="form-control" @error('caption') is-invalid @enderror
                        name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-form-label">Post Image</label>
                <input type="file" id="image" name="image" @error('image') is-invalid @enderror class="form-control-file">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add New Post</button>
        </div>
    </form>
</div>

@endsection