<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $products = Product::create($request->all());

        return response()->json([
            "message" => "Product Added Successfully",
            "Product" => $products
        ]);
    }


    public function show($id)
    {
        $products = Product::where('id', $id)->first();
        return response()->json($products);
    }


    public function edit($id)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $products = Product::where('id', $id)->first();
        $products->update($data);


        return response()->json([
            "message" => "Product Updated Successfully",
            "Product" => $products
        ]);
    }


    public function destroy($id)
    {
        $products = Product::find($id);

        $products->delete();

        return response()->json('Product Deleted Successfully');
    }
}
