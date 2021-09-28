@extends('layouts.app')

@section('content')
<h1>Posts</h1>

@foreach ($items as $item)
  <a href="{{ route('posts') . '/' . $item}}"> {{ $item }} </p>
@endforeach

@endsection