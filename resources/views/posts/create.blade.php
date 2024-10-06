@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">
                <span>画像</span>
                <input type="file" name="image" placeholder="image">
            </label>
        </div>
        <div>
            <label for="title">
                <span>タイトル</span>
                <input type="text" name="title" placeholder="title">
            </label>
        </div>
        <div>
            <label for="body">
                <span>本文</span>
                <textarea name="body" placeholder="body"></textarea>
            </label>
        </div>
        <button type="submit">投稿</button>
    </form>
</div>

@endsection
