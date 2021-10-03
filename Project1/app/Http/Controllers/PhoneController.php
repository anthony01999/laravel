<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;


class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return response()->json($phones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $phones = new Phone([
            'user_id' => request()->get('user_id'),
            'phone' => request()->get('phone'),
        ]);
        $phones->save();
        return response()->json([
            "message" => "Phone Added Successfully",
            "Product" => $phones
        ]);
    }*/

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $phone = Phone::where('id', $id)->first();
        $phone->update($data);


        return response()->json([
            "message" => "Phone Updated Successfully",
            "Phone" => $phone
        ]);
    }
}
