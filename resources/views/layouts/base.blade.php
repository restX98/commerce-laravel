@extends('layouts.app')

@section('body')
    <x-header />

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Tutti i diritti riservati © 2023</p>
    </footer>
@endsection
