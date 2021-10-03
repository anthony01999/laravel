<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('orders')->get();
        return response()->json($customers);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'companyName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $input = $request->all();

        $customers = Customer::create($input);

        return response()->json([
            "message" => "Customer Added Successfully",
            "Customer" => $customers
        ]);
    }

    public function show($id)
    {
        $customers = Customer::where('customerId', $id)->with('orders')->first();
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
