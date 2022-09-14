<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Amentities;
use Illuminate\Http\Request;

class AmentitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amentities =  Amentities::with('product')->get();
        return view('amentities.index',['amentities'=> $amentities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product  =  Product::all();
        return view('amentities.create', compact('product'));
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
            'name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        Amentities::create($request->all());

        return redirect('amentities')->with('success', 'Amentities Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amentities  $amentities
     * @return \Illuminate\Http\Response
     */
    public function show(Amentities $amentities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amentities  $amentities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amentities = Amentities::findOrFail($id);
         $product  =  Product::all();
        return view('amentities.edit', ['product' =>$product, 'amentities' => $amentities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amentities  $amentities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        
            $amentities = Amentities::findOrfail($id);
            $amentities->name = $request->name;
            $amentities->product_id = $request->product_id;
            $amentities->description = $request->description;
            $amentities->status = $request->status;
            $amentities->update();
        return redirect('amentities')->with('success', 'Amentities Updated Successfully.');
 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amentities  $amentities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amentities $amentities)
    {
        $amentities->delete();

        return redirect()->route('amentities')
            ->with('success', 'Amentities Deleted Successfully');
    }
}
