@extends('layouts.app')

@vite(['resources/js/miniCart.js'])

@section('body')
    <x-header />

    <main>
        @yield('content')
    </main>


    <x-footer />
@endsection
