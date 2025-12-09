@extends('layout.template')

@section('title', 'User Info')

@section('content')
    <div class="container">
        <h2 class="title is-2">User Info</h2>
        <hr>

        <form action="/admin/user/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Username</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="username" name="username" value="{{ $user->username }}" disabled>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Name</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Role</label>
                </div>
                <div class="column">
                    <div class="select is-fullwidth">
                        <select name="role">
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="approver" {{ old('role', $user->role) == 'approver' ? 'selected' : '' }}>
                                Approver
                            </option>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Account Status</label>
                </div>
                <div class="column">
                    <div class="select is-fullwidth">
                        <select name="active">
                            <option value="" disabled selected>Select Account Status</option>
                            <option value="0" {{ old('active', $user->active) == '0' ? 'selected' : '' }}>Not
                                Active
                            </option>
                            <option value="1" {{ old('active', $user->active) == '1' ? 'selected' : '' }}>Active
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-light" href="{{ url('/admin/users') }}">Cancel</a>
                </div>
                <div class="control">
                    <button class="button is-link" type="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
