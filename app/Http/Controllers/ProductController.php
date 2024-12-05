<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Kyon147\LaravelShopify\Facades\Shopify;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('product_form');
    }

    public function createProduct(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'product_type' => 'nullable|string|max:255',
        ]);

        // Create the product on Shopify using the Shopify API
        try {
            $product = Shopify::rest('POST', '/admin/api/2024-10/products.json', [
                'product' => [
                    'title' => $validated['title'],
                    'body_html' => $validated['description'],
                    'variants' => [
                        [
                            'price' => $validated['price'],
                            'sku' => 'SKU' . time(),
                        ]
                    ],
                    'product_type' => $validated['product_type']
                ]
            ]);
            return back()->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }
}
