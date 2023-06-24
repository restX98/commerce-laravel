@extends('layouts.base')

@vite(['resources/css/profile.css'])

@section('content')
    <div id="profile">
        <div class="personal-info">
            <h2>Dati personali</h2>
            <div class="info-row">
                <label for="name">Nome:</label>
                <span id="name">{{ $customer->firstName }}</span>
            </div>
            <div class="info-row">
                <label for="surname">Cognome:</label>
                <span id="surname">{{ $customer->lastName }}</span>
            </div>
            <div class="info-row">
                <label for="email">Email:</label>
                <span id="email">{{ $customer->email }}</span>
            </div>
            <div class="info-row">
                <label for="phone">Telefono:</label>
                <span id="phone">{{ $customer->phoneNumber }}</span>
            </div>
        </div>

        <div class="orders">
            <h2>Ordini</h2>
            @php
                $orders = $customer->order()->get();
            @endphp
            <ul class="order-list">
                @foreach ($orders as $order)
                    <li>{{ $order->toString() }}</li>
                @endforeach
            </ul>
        </div>

        <div class="addresses">
            <h2>Indirizzi</h2>
            @php
                $addresses = $customer->address()->get();
            @endphp
            <ul class="address-list">
                @foreach ($addresses as $address)
                    <li>{{ $address->toString() }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
