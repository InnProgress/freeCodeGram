<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = \App\Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request() -> validate([
            'title' => 'required',
            'caption' => 'required',
            'image' => 'required|image'
        ]);
            
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200)->save();

        $id = auth()->user()->posts()->create([
            'title' => $data['title'],
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        // \App\Post::create($data);

        return redirect('p/' . $id->id);

            // ANOTHER WAY OF CREATING NEW POST
        // $newPost = new \App\Post();
        // $newPost->title = request('title');
        // $newPost->caption = request('caption');
        // $newPost->image = request('image');
        // $newPost->user_id = \Auth::user()->id;
        // $newPost->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Post $p)
    {
        // $post = \App\Post::findOrFail($id); // another way of doing it
        return view('posts.show', [
            'post' => $p
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
