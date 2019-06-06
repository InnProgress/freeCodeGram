@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <div class="" style="width: 150px; height: 150px;">
                <img src="{{ $user->profile->profileImage() }}" style="width: 100%;" class="rounded-circle">
            </div>
        </div>
        <div class="col-9 pt-5 px-1 pb-2">
            <div class="mb-3">
                <h1 style="font-size: 20px;" class="d-inline">{{ $user->username }}</h1>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" />
                <!-- <button class="rounded border border-secondary px-4 ml-3 font-weight-bold d-inline btn-primary">Follow</button> -->
                <!-- <button class="rounded border border-secondary px-3 ml-2 font-weight-bold d-inline">-</button> -->
            </div>
            @can('update', $user->profile)
                <a href="/p/create/" style="float: right; display: inline-block;">Add new post</a>
            @endcan
            <div>
                <ul class="p-0">
                    <li class="d-inline mr-4"><span><strong>{{ $postsCount }}</strong> posts</span></li>
                    <li class="d-inline mr-4"><span><strong>{{ $followersCount }}</strong> followers</span></li>
                    <li class="d-inline mr-4"><span><strong>{{ $followingCount }}</strong> following</span></li>
                </ul>
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit/" style="float: right; display: inline-block;">Edit profile</a>
            @endcan

            <div>
                <p class="m-0 p-0"><strong>{{ $user->profile->title }}</strong></p>
                <p class="m-0 p-0">{{ $user->profile->description }}</p>
                <a href={{ "http://" . $user->profile->url }} target="_blank"><strong>{{ $user->profile->url }}</strong></a>
            </div>
        </div>
    </div>

    <hr>

    @if(count($user->posts) > 0)
    <div class="row posts">
        @foreach($user->posts as $post)
           <div class="col-4 my-2">
                <a href="/p/{{ $post->id }}">
                    <div class="img-container">
                        <img src="{{ '/storage/' . $post->image }}" alt="{{ $post->caption }}">
                        <div class="shadow">
                            <i class="fas fa-heart"></i> 425
                            <i class="fas fa-comment"></i> 123
                        </div>
                    </div>
                </a>
            </div> 
        @endforeach
    </div>
    @else
        <p style="text-align: center;">No posts yet...</p>
    @endif

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection
