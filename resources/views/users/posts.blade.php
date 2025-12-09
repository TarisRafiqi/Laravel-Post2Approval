@extends('layout.template')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div>
            <h2 class="title is-2">Post Queue List</h2>
            <hr>
            <div class="field">
                <a class="button is-warning" href="/users/posts/input-post">Create New Post</a>
            </div>

            <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th class="has-text-centered">Author</th>
                        <th class="has-text-centered">First Approver</th>
                        <th class="has-text-centered">Second Approver</th>
                        <th class="has-text-centered">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="is-vcentered">{{ $post->title }}</td>
                            <td class="has-text-centered is-vcentered">{{ $post->author }}</td>

                            <td class="has-text-centered is-vcentered">
                                {{ $post->approver1 ? $post->approver1->name : 'Waiting' }} <br>
                                {!! $post->status_1 !!}</td>

                            <td class="has-text-centered is-vcentered">
                                {{ $post->approver2 ? $post->approver2->name : 'Waiting' }} <br>
                                {!! $post->status_2 !!}</td>

                            <td class="is-narrow is-vcentered">
                                <a class="button is-success is-outlined is-small" href="/users/posts/{{ $post['slug'] }}">
                                    <span class="icon is-small">
                                        <i class="fas fa-book-open"></i></a>
                                </span>
                                </a>

                                <a class="button is-link is-outlined is-small" href="/users/edit-post/{{ $post['id'] }}">
                                    <span class="icon is-small">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>

                                <form action="/users/posts/{{ $post->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button is-danger is-outlined is-small">
                                        <span class="icon is-small">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
