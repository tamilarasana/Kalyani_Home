<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $highlight = Highlight::with('product')->get();
        return view('highlight.index', compact('highlight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('highlight.create')->with('product',$product);
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
        
        Highlight::create($request->all());
        return redirect('highlight')->with('success', 'Highlight Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function edit(Highlight $highlight)
    {
        $product = Product::all();
        return view('highlight.edit',['product' => $product, 'highlight' => $highlight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Highlight $highlight)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        
        $highlight->update($request->all());
        return redirect('highlight')->with('success', 'Highlight Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Highlight $highlight)
    {
        $highlight->delete();
        return redirect('highlight')->with('success', 'Highlight Deleted Successfully.');
    }
}
