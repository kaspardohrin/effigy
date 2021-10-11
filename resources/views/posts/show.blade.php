@extends('layouts.app')

@section('content')
<h1>Post</h1>

<p> {{ $post->title }} </p>
<p> {{ $post->description }} </p>

<p>Likes: {{ count($post->likes) }}</p>


<ul>
  <p>Comments:</p>

  @forelse ($post->comments as $comments)
    <li>
      {{ $comments->comment }}
    </li>
  @empty
    <li>Such empty.</li>
  @endforelse
</ul>



<a href="/posts">&larr; Back</a>

@endsection

