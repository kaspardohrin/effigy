<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;

class PostsSearchController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {
        $query = $req->term;
        $tag = $req->tag;

        $tags = Tag::all();


        if ($tag) {
            $posts = Post::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%')
                ->paginate(12)
                ->where('tag', $tag);
        } else {
            $posts = Post::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%')
                ->paginate(12);
        }

        return view('posts.index', [
            'posts' => $posts,
            'tags' => $tags,
        ]);
    }
}
