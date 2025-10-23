<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getData()
    {
        $product = Product::get();

        return $product;
    }

    public function store(Request $request)
    {
        $validated = [
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1'
        ];

        $validation = Validator::make($request->all(), $validated);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors()
            ], 422);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json([
            'code' => 200,
            'message' => 'success insert data'
        ]);
    }
    public function update(Request $request, $id)
    {
        $validated = [
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1'
        ];

        $validation = Validator::make($request->all(), $validated);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors()
            ], 422);
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json([
            'code' => 200,
            'message' => 'success update data'
        ]);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json([
            'message' => 'success delete product'
        ]);
    }
}