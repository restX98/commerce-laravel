@extends('layouts.blank')

@vite(['resources/js/register.js'])
@vite(['resources/css/register.css'])

@section('content')
    <div id="register">
        <div id="server-error" class="error-message server-error"></div>
        <div class="container">
            <form class="register-form" action="/signin" method="POST">
                @csrf

                <h1>Crea un account</h1>

                <input type="text" id="first-name-input" name="firstName" value="{{ old('firstName') }}" placeholder="Nome">
                <div id="first-name-error" class="error-message">
                    @error('firstName')
                        {{ $message }}
                    @enderror
                </div>

                <input type="text" id="last-name-input" name="lastName" value="{{ old('firstName') }}"
                    placeholder="Cognome">
                <div id="last-name-error" class="error-message">
                    @error('lastName')
                        {{ $message }}
                    @enderror
                </div>

                <input type="email" id="email-input" name="email" value="{{ old('email') }}" placeholder="Email">
                <div id="email-error" class="error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <input type="text" id="phone-input" name="phoneNumber" value="{{ old('phoneNumber') }}"
                    placeholder="Numero di telefono">
                <div id="phone-error" class="error-message">
                    @error('phoneNumber')
                        {{ $message }}
                    @enderror
                </div>

                <input type="password" id="password-input" name="password" placeholder="Password">
                <div id="password-error" class="error-message">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <input type="password" name="password_confirmation" id="confirm-password-input"
                    placeholder="Conferma password">
                <div id="confirm-password-error" class="error-message"></div>

                <button type="submit">Registrati</button>

                <div class="login-link">
                    <p>Hai già un account? Effettua il <a href="/login">login</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
