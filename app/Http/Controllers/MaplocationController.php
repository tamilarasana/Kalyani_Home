<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Maplocation;
use Illuminate\Http\Request;

class MaplocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maplocation = Maplocation::with('product')->get(   );
        return view('maplocation.index',compact('maplocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product =  Product::all();
        return view('maplocation.create', compact('product'));
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
            'location_name' => 'required',
            'product_id' => 'required',
            'map_link' => 'required',
            'data' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        Maplocation::create($request->all());
        return redirect('maplocation')->with('success', 'Maplocation Created sSuccessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maplocation  $maplocation
     * @return \Illuminate\Http\Response
     */
    public function show(Maplocation $maplocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maplocation  $maplocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Maplocation $maplocation)
    {
        $product =  Product::all();
        return view("maplocation.edit",['maplocation' => $maplocation, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maplocation  $maplocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maplocation $maplocation)
    {
        $request->validate([
            'location_name' => 'required',
            'product_id' => 'required',
            'map_link' => 'required',
            'data' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        $maplocation->update($request->all());
        return redirect('maplocation')->with('success', 'Maplocation Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maplocation  $maplocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maplocation $maplocation)
    {
        $maplocation->delete();
        return redirect('maplocation');
    }
}
