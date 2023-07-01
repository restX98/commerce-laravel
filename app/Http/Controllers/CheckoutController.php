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

        /** @var Customer $customer */
        $customer = Auth::user();

        $shippingAddresses = $customer->address()->get();

        return view('checkout.show', [
            "basket" => $basket,
            "shippingAddresses" => $shippingAddresses
        ]);
    }

    public function placeOrder(Request $request)
    {
        /** @var Customer $customer */
        $customer = Auth::user();

        if (!$request->has('addressId')) {
            $formFields = $request->validate([
                'street' => 'required',
                'houseNumber' => 'required',
                'postalCode' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
            ]);

            $address = $customer->addAddress($formFields);
        } else {
            $address = $customer->address()->find($request->addressId);
        }

        if (is_null($address)) {
            return response()->json([
                'success' => false,
            ]);
        }

        $basket = Basket::getCurrentBasket();

        $order = Order::placeOrder($basket, $address);

        return response()->json([
            'success' => true,
            'message' => 'Operazione completata con successo',
            'orderID' => $order->cod
        ]);
    }
}
