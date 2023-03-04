<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->is_buyer, 403);

        $products = Product::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(30);

        return view('products', compact('products'));
    }

    public function create()
    {
        abort_if(auth()->user()->is_buyer, 403);

        return view('products-create');
    }

    public function store(ProductRequest $request, Product $product)
    {
        abort_if(auth()->user()->is_buyer, 403);

        $product->create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('products');

    }
}
