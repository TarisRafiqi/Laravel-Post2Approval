@extends('layout.template')

@section('title', 'Input Post')

@section('content')

    <div class="container">
        <div>
            <h2 class="title is-2">Add New Post</h2>
            <hr>
            <form action="/users/posts/store" method="POST">
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input class="input" id="title" name="title" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="author">Author</label>
                    <div class="control">
                        <input class="input" id="author" name="author" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>
                    <div class="control">
                        <textarea class="textarea" id="body" name="body" required></textarea>
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <div class="control">
                            <a class="button is-light" href="/users/posts">Back to posts</a>
                        </div>
                    </div>
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
@endsection
