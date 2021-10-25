@extends('layouts.app')

@section('content')
  <a href="/posts">&larr; Back</a>

  <h1>Post</h1>

  <p> {{ $post->title }} </p>
  <p> {{ $post->description }} </p>
  <img class="mt-4 mx-auto" src="{{ asset($post->path) }}" alt="image">

  <p>Likes: {{ count($post->likes) }}</p>

  <!-- add like -->
  <form action="/likes" method="POST">
    @csrf
    <div class="block">
      <button>
        &uarr;
      </button>
    </div>
  </form>

  <!-- remove like -->
  <form action="/likes/{{ $post->id }}" method="POST">
    @csrf
    @method('delete')
    <button>
      &darr;
    </button>
  </form>

  <!-- list all comments on currently selected post -->
  <ul>
    <p>Comments:</p>

    @forelse ($post->comments as $comments)
      <li>
        {{ $comments->comment }}
        <!-- delete comment -->
        <form action="/comments/{{ $comments->id }}" method="POST">
          @csrf
          @method('delete')
          <button>
            Delete &rarr;
          </button>
        </form>
      </li>

    @empty
      <li>Such empty.</li>
    @endforelse
  </ul>

  <!-- add comment -->
  <form action="/comments" method="POST">
    @csrf
    <div class="block">
      <input
          type="text"
          name="comment"
          placeholder="Comment.."
      >
      <button>
        Reply
      </button>
    </div>
  </form>

  <a href="/posts">&larr; Back</a>

@endsection
