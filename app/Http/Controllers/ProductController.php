<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Category $category)
    {
        return view('products.index', [
            'products' => $category->product()->latest()->paginate(16)
        ]);
    }

    public function search()
    {
        return view('products.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(16)
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
