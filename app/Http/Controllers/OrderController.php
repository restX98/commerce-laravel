<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function thankyou(Request $request)
    {
        /** @var Customer $customer */
        $customer = Auth::user();
        $order = $customer->order()->get()->where('id', intval($request->orderNo))->first();
        if (!$order) {
            return redirect('/');
        }

        return view('order.thankyou', [
            'order' => $order
        ]);
    }
}
