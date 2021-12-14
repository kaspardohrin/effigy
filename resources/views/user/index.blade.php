@extends('layouts.app')

@section('content')
  <!-- @if(auth()->user()->admin)
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
  @endif -->

  @if(auth()->user()->admin)
    <h1>Users</h1>

    <ul style="list-style: none;">
      @foreach ($users as $user)
        <div style="margin-bottom: 24px;">
          <li>Username: {{ $user->name }}</li>
          <li>Admin: {{ $user->admin }}</li>

          <div style="display: flex; flex-direction: row;">
            <form action="/user/{{ $user->id }}" method="POST">
              @csrf
              @method('put')

              @if($user->admin)
                <button style="all: unset; color: red; margin-right: 10px; cursor: pointer">
                  &#9759; Downgrade
                </button>
              @else
                <button style="all: unset; color: green; margin-right: 10px; cursor: pointer">
                  &#9757; Upgrade
                </button>
              @endif
            </form>
            <form action="/user/{{ $user->id }}" method="POST">
              @csrf
              @method('delete')
              <button style="all: unset; color: red; margin-right: 10px; cursor: pointer">
                &#9760; Ban
              </button>
            </form>
          </div>

        </div>
      @endforeach
    </ul>

  @endif

  <div style="height: 32px;" ></div>

  <h1>Posts</h1>

  <a
    style="float: right;"
    href="posts/create">
    &#9998; NEW
  </a>

  <p>Amount of posts: <b>{{ count($posts); }}</b></p>

  <div style="display: flex; flex-wrap: wrap;">

    @foreach ($posts as $post)

      <div style="border: 1px solid #5f5f5f50; width: 250px; margin: 0 12.5px 15px 12.5px">

        <p style="font-weight: bold;">{{ $post->title }}</p>
        <!-- <p>{{ $post->description }}</p> -->
        <img
            style="max-width: 248px; max-height: 250px;"
            class="post-image"
            src="{{ asset($post->path) }}"
            alt="image"
        >

        <p>Likes: {{ count($post->likes) }}</p>
        <p>Comments: {{ count($post->comments) }}</p>

        <div style="display: flex; flex-direction: row; flex-wrap: wrap;">
          <a href="posts/{{ $post->id }}">View &rarr;</a>

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

          <a style="margin-left: auto;" href="posts/{{ $post->id }}/edit">&#9998; Edit</a>

          <!-- post deletion logic -->
          <form style="margin-left: auto;" action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('delete')
            <button style="all: unset; color: red; margin-right: 10px; cursor: pointer">
              &#9747; Delete
            </button>
          </form>
        </div>

      </div>

    @endforeach
  <div>

@endsection