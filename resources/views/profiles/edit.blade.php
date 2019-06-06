@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8 offset-2">

            <h2 class="text-center">Edit profile</h2>

            <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="title">{{ __('Title') }}</label>
            
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description">{{ __('description') }}</label>
            
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url">{{ __('url') }}</label>
            
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
        
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image">{{ __('Image') }}</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
