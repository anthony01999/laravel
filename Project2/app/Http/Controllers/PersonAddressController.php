<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonAddress;
use Illuminate\Support\Facades\Validator;

class PersonAddressController extends Controller
{
    public function index()
    {
        $personaddress = PersonAddress::with('persons', 'addresses')->get();
        return response()->json($personaddress);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person_id' => 'required',
            'address_id' => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $personaddress = new PersonAddress([
            'person_id' => request()->get('person_id'),
            'address_id' => request()->get('address_id'),
        ]);
        $personaddress->save();
        return response()->json([
            'success' => true,
            'Person Address' => $personaddress
        ]);
    }
}
