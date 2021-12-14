@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

@if (!auth()->user()->worthy())

  <p>You'll need to have liked or disliked atleast 5 posts before being allowed to create you own posts!</p>

@else

  <form action="/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="block">
      <input
        type="file"
        name="image"
      >
      <input
        type="text"
        name="title"
        placeholder="Post title.."
      >
      <input
        type="text"
        name="description"
        placeholder="Post description.."
      >

      <button>
        Submit
      </button>
    </div>
  </form>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
    <ul>
      <li style="color:red;">
        {{ $error }}
      </li>
    </ul>
    @endforeach
  @endif
@endif

@endsection
