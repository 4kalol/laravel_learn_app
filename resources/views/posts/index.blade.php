@extends('layouts.app')

@section('title', 'List of Posts')

@section('content')

    {{-- <x-alert type="warning">
        <p>警告メッセージ</p>
    </x-alert> --}}

    <a href="{{ route('posts.create')}}">新規投稿</a>

    <div class="row">
    @foreach ($posts as $post)
        <img src="https://picsum.photos/200" alt="">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
    @endforeach
@endsection
