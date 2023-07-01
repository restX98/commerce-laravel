<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Category $category)
    {
        return view('products.index', [
            'category' => $category,
            'products' => $category->product()->latest()->paginate(16)
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
