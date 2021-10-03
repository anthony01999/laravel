<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function index()
    {
        $designs = Design::with('orders', 'lineItemDesigns')->get();
        return response()->json($designs);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'type' => 'required',
            'location' => 'required',
            'color' => 'required'
        ]);

        $input = $request->all();

        $designs = Design::create($input);

        return response()->json([
            "message" => "Design Added Successfully",
            "Design" => $designs
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
