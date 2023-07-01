@vite(['resources/css/shippingFields.css'])

<div class="shipping-fields">
    <h2>Indirizzo di spedizione</h2>

    <div class="address-radio-group">
        @foreach ($shippingAddresses as $shippingAddress)
            <div class="shipping-address-item">
                <label class="radio-button">
                    {{ $shippingAddress->toString() }}
                    <input type="radio" id="{{ $shippingAddress->id }}" name="shippingAddress"
                        value="{{ $shippingAddress->id }}">
                    <span class="checkmark"></span>
                </label>
            </div>
        @endforeach
        <div class="shipping-address-item">
            <label class="radio-button">
                Aggiungi Indirizzo
                <input type="radio" id="new-address" name="shippingAddress" value="new-address">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div id="address-error" class="error-message"></div>

    <x-shipping-fields />
</div>
