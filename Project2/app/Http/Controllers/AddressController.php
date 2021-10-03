<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $adresses = Address::with('persons')->get();
        return response()->json($adresses);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street' => 'required',
            'area' => 'required|',
            'city' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $addresses = new Address([
            'street' => request()->get('street'),
            'area' => request()->get('area'),
            'city' => request()->get('city'),
            'country' => request()->get('country'),
        ]);
        $addresses->save();
        return response()->json([
            'success' => true,
            'Address' => $addresses
        ]);
    }

    public function update(Request $request, $id)
    {
        $addresses = Address::where('id', $id)->with('persons')->first();
        $validator = Validator::make($request->all(), [
            'street' => 'required',
            'area' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $addresses->update($request->all());


        return response()->json([
            'success' => true,
            'Address' => $addresses
        ]);
    }
}
