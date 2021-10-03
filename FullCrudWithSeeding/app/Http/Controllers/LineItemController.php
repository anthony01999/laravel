<?php

namespace App\Http\Controllers;

use App\Models\LineItem;
use Illuminate\Http\Request;

class LineItemController extends Controller
{
    public function index()
    {
        $lineItems = LineItem::with('orders', 'lineItemDesign')->get();
        return response()->json($lineItems);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'productDescription' => 'required',
            'productColor' => 'required',
        ]);

        $input = $request->all();

        $lineItems = LineItem::create($input);

        return response()->json([
            "message" => "Line Added Successfully",
            "Line Item" => $lineItems
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
