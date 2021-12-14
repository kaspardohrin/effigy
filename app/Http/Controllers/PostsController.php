<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $rand_int = rand(0, 1e6);

        $name = time() . '-' . $rand_int . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $name);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'path' => 'images/' . $name,
            'hidden' => false,
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if ($post->hidden) return redirect('/posts');

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $user_id = auth()->user()->id;
        $owner = Post::find($id)->user_id == $user_id;
        $admin = auth()->user()->admin;
        if (
            (!$owner) || (!$owner && !$admin)
        ) return redirect('/posts');

        return view('posts.edit')->with('post', $post);
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
        $user_id = auth()->user()->id;
        $owner = Post::find($id)->user_id == $user_id;
        $admin = auth()->user()->admin;
        if (
            (!$owner) || (!$owner && !$admin)
        ) return redirect('/posts');

        $post = Post::where('id', $id)->
            update([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

        return redirect('/posts/' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $owner = Post::find($id)->user_id == $user_id;

        if (!$owner) return redirect('/posts');

        $post = Post::where('id', $id)->
            update([
                'hidden' => !Post::find($id)->hidden,
            ]);

        return redirect('/profile');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $user_id = auth()->user()->id;
        $owner = $post->user_id == $user_id;
        $admin = auth()->user()->admin;
        if (
            (!$owner) || (!$owner && !$admin)
        ) return redirect('/posts');

        $post->delete();

        return redirect('/posts');
    }
}
