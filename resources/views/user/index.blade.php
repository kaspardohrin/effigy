@extends('layouts.app')

@section('content')
  @if(auth()->user()->admin)
    <h1>Users</h1>

    @foreach ($users as $user)
      <p>{{ $user->name }}, {{ $user->admin }}</p>
      <form action="/user/{{ $user->id }}" method="POST">
        @csrf
        @method('delete')
        <button>
          BAN &rarr;
        </button>
      </form>
      <form action="/user/{{ $user->id }}" method="POST">
        @csrf
        @method('put')
        <button>
          @if($user->admin)
            Downgrade &rarr;
          @else
            Upgrade &rarr;
          @endif
        </button>
      </form>


    @endforeach

  @endif



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

    <form action="/posts/activate/{{ $post->id }}" method="POST">
      @csrf
      @method('put')
      <button>
        @if($post->hidden)
          Activate &rarr;
        @else
          Disable &rarr;
        @endif
      </button>
    </form>

  @endforeach

@endsection