<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Category $category) {
        return view('products.index', [
            'category' => $category,
            'products' => $category->product()->get()
        ]);
    }

    public function show(Product $product) {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}