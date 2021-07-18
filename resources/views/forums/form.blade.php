<?php
$forum = $forum ?? null;
?>
@extends('components.layouts.forumlayout')

@section('content')

<form action="{{$forum ? route('forums.update', $forum) : route('forums.store') }}" method="post">
    @csrf

    @if($forum)
        @method('put')
    @endif

    <h2>Create Forum</h2>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <textarea class="form-control" name="title" id="title" placeholder="Title" required autofocus>{{ old('title', $forum->title ?? null) }}</textarea>
        @error('title')
            <span>{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Description" required autofocus>{{ old('description', $forum->description ?? null) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">@if($forum) Edit Forum @else Create Forum @endif</button>
</form>


@endsection
