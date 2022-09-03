<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Product;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $season = Season::with('product')->get();
       return view('season.index',compact('season'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('season.create')->with('product',$product);
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
            'season_name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        Season::create($request->all());
        return redirect('season')->with('success', 'Season Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        $product = Product::all();
        return view('season.edit',['product' => $product, 'season' => $season]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        
        $request->validate([
            'season_name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $season->update($request->all());
        return redirect('season')->with('success', 'Season Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->delete();
        return redirect('season')->with('success', 'Season Deleted Successfully.');
    }
}
