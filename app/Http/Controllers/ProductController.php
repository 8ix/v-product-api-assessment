<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        $query = Product::query()->with('categories');

        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('code', 'like', "%{$searchTerm}%")
                  ->orWhereHas('categories', function($q) use ($searchTerm) {
                      $q->where('category', 'like', "%{$searchTerm}%");
                  });
            });
        }

        $products = $query->orderBy('code', 'asc')
                          ->paginate($request->input('per_page', 10));

        return ProductResource::collection($products);
    }
}