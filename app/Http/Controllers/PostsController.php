<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // $title = "Welcome to my products page.";
        // $description = "Very cool indeed.";

        // compact method
        // return view('products/index', compact('title', 'description'));

        $items = [
            'first',
            'second',
            'third',
        ];

        return view('posts.index', [
            'items' => $items
        ]);
    }

    public function detail($name)
    {
        $items = [
            'first' => 'one',
            'second' => 'two',
            'third' => 'three',
        ];

        return view('posts.detail', [
            'item' => $items[$name] ?? 'post ' . $name . ' is not found.'
        ]);
    }
}
