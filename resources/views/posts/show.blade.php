@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row border-rounded mt-4">
        <div class="col-8 post-image">
            <img src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-4 post-info">
            <div class="post-info--author py-4">
                <a href="/profile/{{ $post->user->id }}" class="post-info--autohor-link">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle mr-2">
                    {{ $post->user->username }}
                </a>

                <a href="#" class="pl-2"><strong>Follow</strong></a>
            </div>
            <div>
                <p>
                    <a href="/profile/{{ $post->user->id }}" class="post-info--autohor-link">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle mr-2">
                        {{ $post->user->username }}
                    </a>
                    <span>{{ $post->caption }}</span>
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
