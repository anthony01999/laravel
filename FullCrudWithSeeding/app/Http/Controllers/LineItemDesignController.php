<?php

namespace App\Http\Controllers;

use App\Models\LineItemDesign;
use Illuminate\Http\Request;

class LineItemDesignController extends Controller
{
    public function index()
    {
        $lineItemsDesigns = LineItemDesign::with('designs', 'lineItems', 'orders')->get();
        return response()->json($lineItemsDesigns);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'design_id' => 'required',
            'line_id' => 'required',
            'order_id' => 'required',
        ]);

        $input = $request->all();

        $lineItemsDesigns = LineItemDesign::create($input);

        return response()->json([
            "message" => "Line Item Design Added Successfully",
            "Line Item Design" => $lineItemsDesigns
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
