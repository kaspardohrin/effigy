@extends('layouts.app')

@section('content')
  <h1>Posts</h1>

  <div style="display: flex; flex-direction: row; margin-bottom: 20px;">

    <p style="margin: auto 0;">Amount of posts: <b>{{ count($posts); }}</b></p>

    <form style="margin: auto auto;" action="/posts/search" method="post">
      @csrf
      <div>
        <label style="margin: auto 0;" for="body">Search:</label>
        <input style="margin: auto 0;" type="text" name="term" id="term" placeholder="Enter your search term" value="{{ old('text') }}">
      </div>
    </form>

    <a
      style="margin: auto 0;"
      href="posts/create">
      &#9998; NEW
    </a>
  </div>

  <div style="display: flex; flex-wrap: wrap;">

    @foreach ($posts as $post)

      @if(!$post->hidden)

        <div style="border: 1px solid #5f5f5f50; width: 250px; margin: 0 12.5px 15px 12.5px">

          <p style="font-weight: bold;">{{ $post->title }}</p>
          <!-- <p>{{ $post->description }}</p> -->
          <img
              style="max-width: 248px; max-height: 250px;"
              class="post-image"
              src="{{ asset($post->path) }}"
              alt="image"
          >
          <!-- <div style="display: flex;"> -->
            <p>Likes: {{ count($post->likes) }}</p>
            <p>Comments: {{ count($post->comments) }}</p>
            <a href="posts/{{ $post->id }}">View &rarr;</a>
          <!-- </div> -->

        </div>

      @endif

    @endforeach
  <div>

@endsection