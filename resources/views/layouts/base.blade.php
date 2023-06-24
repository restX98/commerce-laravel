@extends('layouts.app')

@vite(['resources/js/miniCart.js'])

@section('body')
    <x-header />

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Tutti i diritti riservati © 2023</p>
    </footer>
@endsection
