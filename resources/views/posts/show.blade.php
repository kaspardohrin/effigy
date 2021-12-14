@extends('layouts.app')

@section('content')
  <a href="/posts">&larr; Back</a>

  <h1> {{ $post->title }} </h1>
  <p> {{ $post->description }} </p>

  <img style="width: 100%;" src="{{ asset($post->path) }}" alt="image">

  <div style="display: flex; flex-direction: row; margin: 5px 0;">
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
        <button style="all: unset; color: green; padding: 0 5px; margin-left: 5px; cursor: pointer;">
          &uarr;
        </button>
      </div>
    </form>


    <!-- remove like -->
    <form action="/likes/{{ $post->id }}" method="POST">
      @csrf
      @method('delete')
      <button style="all: unset; color: red; padding: 0 5px; margin-left: 5px; cursor: pointer;">
        &darr;
      </button>
    </form>

    <!-- if user is the owner of the post -->
    @if (auth()->user()->id == $post->user_id)
      <a style="margin: 0 5px 0 auto" href="/posts/{{ $post->id }}/edit">&#9998; Edit</a>

      <!-- activation/deactivation logic -->
      <form style="margin-left: auto;" action="/posts/activate/{{ $post->id }}" method="POST">
        @csrf
        @method('put')
        @if($post->hidden)
          <button style="all: unset; color: green; margin-right: 10px; cursor: pointer">
            &#9745; Show
          </button>
        @else
          <button style="all: unset; color: red; margin-right: 10px; cursor: pointer">
            &#9746; Hide
          </button>
        @endif
      </form>
    @endif

    @if (auth()->user()->id == $post->user_id || auth()->user()->admin)
    <form style="margin-left: auto;" action="/posts/{{ $post->id }}" method="POST">
      @csrf
      @method('delete')
      <button style="all: unset; color: red; cursor: pointer;">
        &#9747; Delete
      </button>
    </form>
    @endif
  </div>

  <!-- list all comments on currently selected post -->
  <p>Comments:</p>

  <p>Amount of comments: {{ count($post->comments); }}</p>

  <ul>
    @forelse ($post->comments as $comments)
      <li style="display: flex; flex-direction: row;">

        <p style="">
          {{ $comments->comment }}
        </p>

        <!-- delete comment -->
        @if ($comments->user_id == auth()->user()->id || auth()->user()->admin)
          <form style="margin-left: auto;" action="/comments/{{ $comments->id }}" method="POST">
            @csrf
            @method('delete')
            <button style="all: unset; color: red; cursor: pointer;">
              &#9747;
            </button>
          </form>
        @endif

        @empty
        <p>Such empty.</p>

      </li>
    @endforelse
  </ul>

  <ul>
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
  </ul>

@endsection
