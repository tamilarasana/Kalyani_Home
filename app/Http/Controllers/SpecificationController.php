<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Specification;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specification = Specification::with('product')->get();
        return view('specification.index' ,compact('specification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

        $product = Product::all();
        return view('specification.create')->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'spec_name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'remark' => 'required',
            'spec_icon' => 'required',
            'status' => 'required'
        ]); 

        Specification::create($request->all());
        return redirect('specification')->with('success', 'Specification Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        $product = Product::all();
        return view('specification.edit',['product' => $product, 'specification' => $specification]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specification $specification)
    {
        $request->validate([
            'spec_name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'remark' => 'required',
            'spec_icon' => 'required',
            'status' => 'required'
        ]); 

        $specification->update($request->all());
        return redirect('specification')->with('success', 'Specification Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification)
    {
        $specification->delete();
        return redirect('specification')->with('success', 'Specification Deleted Successfully.');
    }
}
