@extends('layouts.app')

@section('content')
  <h1>Posts</h1>

  <div style="display: flex; flex-direction: row; margin-bottom: 20px;">

    <p style="margin: auto 0;">Amount of posts: <b>{{ count($posts); }}</b></p>

    <form style="margin: auto auto; display: flex; flex-direction: row;" action="/search" method="post">
      @csrf
      <label style="margin: auto 5px;" for="body">Select:</label>
      <select for="tags" name="tag">Select genre(s):
          <option value="" selected>-</option>
        @foreach ($tags as $tag)
          <option value="{{ $tag->tag }}">{{ $tag->tag }}</option>
        @endforeach
      </select>

      <div>
        <label style="margin: auto 0 auto 5px;" for="body">Search:</label>
        <input style="margin: auto;" type="text" name="term" id="term" placeholder="Enter your search term" value="{{ old('text') }}">
      </div>

      <button type="submit" style="margin: auto 5px;">Search</button>
    </form>

    <a
      style="margin: auto 0;"
      href="posts/create">
      &#9998; NEW
    </a>
  </div>

  <div style="display: flex; flex-wrap: wrap;">

    @forelse ($posts as $post)

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
          <p>Tag: {{ $post->tag }}</p>
          <p>Likes: {{ count($post->likes) }}</p>
          <p>Comments: {{ count($post->comments) }}</p>
          <a href="posts/{{ $post->id }}">View &rarr;</a>
        <!-- </div> -->

      </div>

      @empty
        <p>There doesn't seem to be any content here</p>

    @endforelse
  <div>

@endsection