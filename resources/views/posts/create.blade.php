@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description"></textarea>
    </div>
    <input type="hidden" name="mass_assignment" value="akjsdkasd">
    <button type="submit" class="btn btn-success">Create</button>
  </form>

@endsection