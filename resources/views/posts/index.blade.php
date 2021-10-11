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