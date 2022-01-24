<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ProfilesController extends Controller
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
        $admin = auth()->user()->admin;
        $user_id = auth()->user()->id;
        $posts = Post::all()->where('user_id', $user_id);

        $users = ($admin) ? User::all() : [];

        return view('user.index', [
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}
