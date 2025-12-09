@extends('layout.template')

@section('title', 'Users Info')

@section('content')
    <div class="container">
        <h2 class="title is-2">Users Info</h2>
        <hr>

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="has-text-centered">Username</th>
                    <th class="has-text-centered">Role</th>
                    <th class="has-text-centered">Active</th>
                    <th class="has-text-centered">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td class="has-text-centered">{{ $user->username }}</td>
                        <td class="has-text-centered is-narrow">{!! $user->role !!}</td>
                        <td class="has-text-centered is-narrow">{!! $user->active !!}</td>
                        <td class="has-text-centered is-narrow">
                            <a class="button is-success is-outlined is-small" href="/admin/user/{{ $user['id'] }}">
                                <span class="icon is-small">
                                    <i class="fas fa-info"></i></a>
                            </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
