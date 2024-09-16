<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
        ->orderBy('code', 'asc')
        ->paginate(
            $request->input('per_page', 10),
        );

        return new ProductCollection($products);
    }
}
