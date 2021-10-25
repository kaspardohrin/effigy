@extends('layouts.app')

@section('content')
  <h1>Posts</h1>

  <a
    href="posts/create">
    NEW &rarr;
  </a>

  @foreach ($posts as $post)

    <p>{{ $post->title }}</p>
    <p>{{ $post->description }}</p>
    <img class="post-image" src="{{ asset($post->path) }}" alt="image">
    <p>Likes: {{ count($post->likes) }}</p>
    <p>Comments: {{ count($post->comments) }}</p>

    <a href="posts/{{ $post->id }}">View &rarr;</a>

    <a href="posts/{{ $post->id }}/edit">Edit &rarr;</a>

    <form action="/posts/{{ $post->id }}" method="POST">
      @csrf
      @method('delete')
      <button>
        Delete &rarr;
      </button>
    </form>

  @endforeach

@endsection