@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

<form action="/posts" method="POST">
  @csrf
  <div class="block">
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

@endsection

