@extends('layout.template')

@section('title', 'Post')

@section('content')
    <div class="container">
        <h2 class="title is-2">My Profile</h2>
        <hr>

        <form action="#" method="POST">
            @csrf
            @method('PATCH')

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Username</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="username" name="username" disabled>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Name</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="name" name="name" required>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Role</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="role" name="role" disabled>
                    </div>
                </div>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-2">
                    <label class="label">Account Status</label>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" id="accountStatus" name="accountStatus" disabled>
                    </div>
                </div>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button class="button is-link" type="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
