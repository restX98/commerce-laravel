<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $basket = Basket::getCurrentBasket();

        return view('checkout.show', [
            "basket" => $basket
        ]);
    }

    public function placeOrder(Request $request)
    {
        $formFields = $request->validate([
            'street' => 'required',
            'houseNumber' => 'required',
            'postalCode' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
        ]);

        /** @var Customer $customer */
        $customer = Auth::user();

        $address = $customer->addAddress($formFields);

        $basket = Basket::getCurrentBasket();

        $order = Order::placeOrder($basket, $address);

        return response()->json([
            'success' => true,
            'message' => 'Operazione completata con successo',
            'address' => $order
        ]);
    }
}
