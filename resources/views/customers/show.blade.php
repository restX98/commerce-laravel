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
            <ul class="order-list">
                <li>Ordine 1</li>
                <li>Ordine 2</li>
                <li>Ordine 3</li>
            </ul>
        </div>
    
        <div class="addresses">
            <h2>Indirizzi</h2>
                {{-- TODO: Add address --}}
            </ul>
        </div>
    </div>

@endsection