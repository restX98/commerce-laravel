<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            'street' => 'required',
            'houseNumber' => 'required',
            'postalCode' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Operazione completata con successo',
        ]);
    }
}
