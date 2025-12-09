@extends('layout.template')

@section('title', 'Post')

@section('content')
    <div class="container">
        <h2 class="title is-2 mb-4">{{ $post->title }}</h2>
        <p class="subtitle is-6">By {{ $post->author }}</p>
        <hr>
        <p class="subtitle is-6">{{ $post->body }}</p>
        <hr>

        <form action="{{ route('admin.post.update', $post->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">First Approver</label>
                        <div class="select is-fullwidth">
                            <select name="uid_approve_1">
                                <option value="" disabled selected>Select First Approver</option>
                                @foreach ($approvers as $approver)
                                    <option value="{{ $approver->id }}"
                                        {{ old('uid_approve_1', $post->uid_approve_1) == $approver->id ? 'selected' : '' }}>
                                        {{ $approver->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="select is-fullwidth">
                            <select name="status_1">
                                <option value="" disabled selected>Select Status</option>
                                <option value="0" {{ old('status_1', $post->status_1) == '0' ? 'selected' : '' }}>
                                    Rejected</option>
                                <option value="1" {{ old('status_1', $post->status_1) == '1' ? 'selected' : '' }}>
                                    Approved</option>
                                <option value="2" {{ old('status_1', $post->status_1) == '2' ? 'selected' : '' }}>Need
                                    Revision</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Second Approver</label>
                        <div class="select is-fullwidth">
                            <select name="uid_approve_2">
                                <option value="" disabled selected>Select Second Approver</option>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}"
                                        {{ old('uid_approve_2', $post->uid_approve_2) == $admin->id ? 'selected' : '' }}>
                                        {{ $admin->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="select is-fullwidth">
                            <select name="status_2" id="status_2" disabled>
                                <option value="" disabled selected>Select Status</option>
                                <option value="0" {{ old('status_2', $post->status_2) == '0' ? 'selected' : '' }}>
                                    Rejected</option>
                                <option value="1" {{ old('status_2', $post->status_2) == '1' ? 'selected' : '' }}>
                                    Approved</option>
                                <option value="2" {{ old('status_2', $post->status_2) == '2' ? 'selected' : '' }}>Need
                                    Revision</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>



            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-light" href="/admin/posts">Back to posts</a>
                </div>
                <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                </div>

            </div>
        </form>

    </div>
    <!-- ---------------------------------------------------------- -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const status1 = document.querySelector('select[name="status_1"]');
            const status2 = document.getElementById('status_2');

            function checkStatus() {
                if (status1.value !== '1') {
                    status2.setAttribute('disabled', 'disabled');
                } else {
                    status2.removeAttribute('disabled');
                }
            }

            status1.addEventListener('change', checkStatus);
            checkStatus();
        });
    </script>
@endsection
