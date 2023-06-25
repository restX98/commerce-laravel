@extends('layouts.blank')

@vite(['resources/js/login.js'])
@vite(['resources/css/login.css'])

@section('content')
    <div id="login">
        <div id="server-error" class="error-message server-error"></div>
        <div class="container">
            <form class="login-form" method="POST" action="/login">
                @csrf

                <h1>Login</h1>

                <input type="text" name="email" id="email-input" placeholder="Email">
                <div id="email-error" class="error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <input type="password" name="password" id="password-input" placeholder="Password">
                <div id="password-error" class="error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <button type="submit">Login</button>

                <div class="register-link">
                    <p>Non hai un account? <a href="/signin">Registrati</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
