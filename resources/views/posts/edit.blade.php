@extends('layouts.app')

@section('content')
<h1>Update Post</h1>

<form action="/posts/{{ $post->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="block">
    <input
      type="text"
      name="title"
      value="{{ $post->title }}"
    >
    <input
      type="text"
      name="description"
      value="{{ $post->description }}"
    >

    <button>
      Submit &rarr;
    </button>
  </div>
</form>

@endsection

