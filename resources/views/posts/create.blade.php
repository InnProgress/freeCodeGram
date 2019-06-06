@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8 offset-2">

            <h2 class="text-center">Add new post</h2>

            <form method="POST" action="/p" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title">{{ __('Title') }}</label>
            
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="caption">{{ __('Caption') }}</label>
            
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
        
                    @error('caption')
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
                        {{ __('Upload') }}
                    </button>
                </div>
            </form>

        </div>
    </div>



</div>
@endsection
