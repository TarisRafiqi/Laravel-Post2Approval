@extends('layout.template')

@section('title', 'Post')

@section('content')
    <div class="container">
        <h2 class="title is-2 mb-4">{{ $post['title'] }}</h2>
        <p class="subtitle is-6">By {{ $post->author }}</p>
        <hr>

        <p class="subtitle is-6">{{ $post['body'] }}</p>

        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <a class="button is-warning" href="/users/posts">Back to posts</a>
            </div>
        </div>
    </div>
@endsection
