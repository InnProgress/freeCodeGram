@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)
    <div class="border-rounded mt-4">
        <div class="post-info">
            <div class="post-info--author py-4 px-4">
                <a href="/profile/{{ $post->user->id }}" class="post-info--autohor-link">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle mr-2">
                    {{ $post->user->username }}
                </a>

                <follow-button user-id="{{ $post->user->id }}" follows="true" />
            </div>
        </div>
        <div class="post-image">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
            </a>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-3">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
