<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    //

    public function index(\App\User $user)
    {
        // $user = DB::table('users')->where('username', $username)->first(); // one way
        // $user = \App\User::findOrFail($username); // another way

        $postsCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function() use ($user) {
            return $user->posts->count();
        });
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        $follows = (auth()->user() ? auth()->user()->following->contains($user->id) : false);
        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }
    public function edit(\App\User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(\App\User $user) {

        $data = request() -> validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'url' => 'url',
            'img' => 'image'
        ]);
        
        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000)->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath ?? $user->profile->image]
        ));

        // $user->profile->title = request('title');
        // $user->profile->description = request('description');
        // $user->profile->url = request('url');
        // $user->push();
        return redirect('/profile/' . $user->id);
    }
}