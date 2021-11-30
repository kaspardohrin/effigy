@extends('layouts.app')

@section('content')
  <a href="/posts">&larr; Back</a>

  <h1>Post</h1>

  <!-- if user is the owner of the post -->
  @if (auth()->user()->id == $post->user_id)
    <a href="/posts/{{ $post->id }}/edit">Edit &rarr;</a>
  @endif

  @if (auth()->user()->id == $post->user_id || auth()->user()->admin)
    <form action="/posts/{{ $post->id }}" method="POST">
      @csrf
      @method('delete')
      <button>
        Delete &rarr;
      </button>
    </form>
  @endif

  <p> {{ $post->title }} </p>
  <p> {{ $post->description }} </p>
  <img class="mt-4 mx-auto" src="{{ asset($post->path) }}" alt="image">

  <p>Likes: {{ count($post->likes) }}</p>

  <!-- add like -->
  <form action="/likes" method="POST">
    @csrf
    <div class="block">
      <input
        type="hidden"
        name="post_id"
        value="{{ $post->id }}"
      >
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

    <p>Amount of comments: {{ count($post->comments); }}</p>

    @forelse ($post->comments as $comments)
      <li>
        {{ $comments->comment }}
        <!-- delete comment -->

        @if ($comments->user_id == auth()->user()->id || auth()->user()->admin)
          <form action="/comments/{{ $comments->id }}" method="POST">
            @csrf
            @method('delete')
            <button>
              Delete &rarr;
            </button>
          </form>
        @endif
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
      <input
        type="hidden"
        name="post_id"
        value="{{ $post->id }}"
      >
      <button>
        Reply
      </button>
    </div>
  </form>

@endsection
