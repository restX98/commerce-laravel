<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $basket = Basket::getCurrentBasket();

        // dd($basket->items[0]->product->cod);
        return view('cart.show', [
            "basket" => $basket
        ]);
    }

    public function addProduct(Request $request)
    {
        $basket = Basket::getCurrentBasket();

        $product = Product::where('cod', $request->cod)->firstOrFail();

        $basket->addProduct($product);

        return response()->json([
            'success' => true,
            'totalQuantity' => $basket->totalQuantity
        ]);
    }

    public function removeProduct(Request $request)
    {
        $basket = Basket::getCurrentBasket();

        $product = Product::where('cod', $request->cod)->firstOrFail();

        $basket->removeProduct($product);

        return response()->json([
            'success' => true,
            'totalQuantity' => $basket->totalQuantity,
            'totalPrice' => round($basket->totalPrice, 2),
            'items' => $basket->items
        ]);
    }
}
