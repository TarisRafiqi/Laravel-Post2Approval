@extends('layout.template')

@section('title', 'Register')

@section('content')
    <div class="register-page">
        <div class="box">
            <div class="field">
                <h2 class="title is-3 has-text-centered">Register</h2>
            </div>

            <form action="/register" method="POST">
                @csrf
                <div class="field">
                    <input class="input" id="name" name="name" placeholder="Name" required>
                </div>

                <div class="field">
                    <input class="input" id="username" name="username" placeholder="Username" required>
                    @error('username')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <input class="input" id="password" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="field">
                    <button class="button is-link is-fullwidth mb-1" type="submit">Submit</button>
                    <a class="button is-link is-fullwidth is-light" href="/login">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .register-page {
        /* height: 70vh; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        width: 100%;
        max-width: 270px;
    }
</style>
