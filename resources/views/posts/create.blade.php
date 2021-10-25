@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

<form action="/posts" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="block">
    <input
      type="file"
      name="image"
    >
    <input
      type="text"
      name="user_id"
      placeholder="User id.."
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

@endsection

