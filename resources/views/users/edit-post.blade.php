@extends('layout.template')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
        <div>
            <h2 class="title is-2">Edit Post</h2>
            <hr>
            <form action="/users/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PATCH') <!-- Ganti dari PUT ke PATCH -->

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input class="input" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="author">Author</label>
                    <div class="control">
                        <input class="input" id="author" name="author" value="{{ old('title', $post->author) }}"
                            required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>
                    <div class="control">
                        <textarea class="textarea" id="body" name="body" required>{{ old('body', $post->body) }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <a class="button is-light" href="{{ url('/users/posts') }}">Cancel</a>
                    </div>
                    <div class="control">
                        <button class="button is-link" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
