<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Producttype;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = Producttype::with('category','location')->get();
        return view('protype.index',compact('producttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $location = Location::all();
        return view('protype.create',['location' => $location, 'category' => $category]);
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
            'category_id' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        Producttype::create($request->all());
        return redirect('producttype')->with('success', 'Product Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function show(Producttype $producttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Producttype $producttype)
    {
        $category = Category::all();
        $location = Location::all();
        return view('protype.edit',['producttype' => $producttype,'location' => $location, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producttype $producttype)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        
        $producttype->update($request->all());
        return redirect('producttype')->with('success', 'Product Type Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producttype $producttype)
    {
        $producttype->delete();
        return redirect('producttype')->with('success', 'Product Type Deleted successfully.');
    }
}
