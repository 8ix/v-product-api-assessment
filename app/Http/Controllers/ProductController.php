<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()->paginate(
            $request->input('per_page', 5),
            ['*'],
            $request->input('page', 1)
        );

        return $products;
    }
}
