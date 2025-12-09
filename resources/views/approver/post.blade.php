@extends('layout.template')

@section('title', 'Post')

@section('content')
    <div class="container">
        <h2 class="title is-2 mb-4">{{ $post->title }}</h2>
        <p class="subtitle is-6">By {{ $post->author }}</p>
        <hr>
        <p class="subtitle is-6">{{ $post->body }}</p>
        <hr>

        <form action="{{ route('approver.post.update', $post->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label">Approver 1</label>
                <div class="control">
                    <input class="input" type="text" name="approver_1" value="{{ $post->approver1->name ?? '' }}"
                        disabled>
                </div>
            </div>

            <div class="field">
                <label class="label">Status 1</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="status_1">
                            <option value="" disabled selected>Select Status</option>
                            <option value="0" {{ old('status_1', $post->status_1) == '0' ? 'selected' : '' }}>
                                Rejected
                            </option>
                            <option value="1" {{ old('status_1', $post->status_1) == '1' ? 'selected' : '' }}>
                                Approved
                            </option>
                            <option value="2" {{ old('status_1', $post->status_1) == '2' ? 'selected' : '' }}>Need
                                Revision
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Approver 2</label>
                <div class="control">
                    <input class="input" type="text" name="approver_2" value="{{ $post->approver2->name ?? '' }}"
                        disabled>
                </div>
            </div>

            <div class="field">
                <label class="label">Status 2</label>
                <div class="control">
                    <input class="input" type="text" name="status_2" value="{{ old('status_2', $post->status_2) }}"
                        disabled>
                </div>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-warning" href="/approver/posts">Back to posts</a>
                </div>

                <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                </div>
            </div>
        </form>



    </div>
@endsection
