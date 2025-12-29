@extends('layout.template')

@section('title', 'Login')

@section('content')
    <div class="login-page">
        <div class="box">
            <div class="field">
                <h3 class="title is-3 has-text-centered">Login</h3>
            </div>

            <form method="POST" action="/login">
                @csrf
                <div class="field">
                    <input class="input" type="text" name="username" placeholder="Username" required>
                </div>

                <div class="field">
                    <input class="input" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="field is-flex is-justify-content-center">
                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                </div>
                {{-- @if ($errors->has('g-recaptcha-response'))
                    <p style="color: red;" class="has-text-centered mb-2">
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif --}}

                <!-- If Login Failed -->
                @if ($errors->any())
                    <p style="color: red;" class="has-text-centered mb-2">
                        {{ implode(', ', $errors->all()) }}
                    </p>
                @endif

                <div class="field">
                    <button type="submit" class="button is-link is-fullwidth mb-1">Submit</button>
                    <a class="button is-link is-light is-fullwidth" href="/register">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .login-page {
        /* height: 70vh; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        width: 100%;
        max-width: 350px;
    }
</style>
