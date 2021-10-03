<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customers', 'designs', 'lineItems', 'lineItemDesigns')->get();
        return response()->json($orders);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'dueDate' => 'required'
        ]);

        $input = $request->all();

        $orders = Order::create($input);

        return response()->json([
            "message" => "Order Added Successfully",
            "Order" => $orders
        ]);
    }

    public function show($id)
    {
        $orders = Order::where('orderId', $id)->with('orders')->first();
        return response()->json($customers);
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
