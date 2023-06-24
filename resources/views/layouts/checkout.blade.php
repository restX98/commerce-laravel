@extends('layouts.app')

@vite(['resources/css/header.css'])

@section('body')
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="logo">
                    <a href="/">Logo</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
@endsection
