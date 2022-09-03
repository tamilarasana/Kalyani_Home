<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Product;
use App\Models\Interior;
use Illuminate\Http\Request;


class InteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interior = Interior::with('product')->get();
        return view('interior.index', compact('interior'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::ALL();
        return view('interior.create',['product' => $product]);
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
            'position' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
        
        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('interior',$imageName,'public');
            $interior_img = $path;
        }    
       $interior = new Interior;
       $interior->name = $request->name;
       $interior->product_id = $request->product_id;
       $interior->position = $request->position;
       $interior->description = $request->description;
       $interior->image = $interior_img;
       $interior->status = $request->status;
       $interior->save(); 
       return redirect('interior')->with('success', 'Interior Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function show(Interior $interior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interior = Interior::findOrFail($id) ;
        $product = Product::all();
        return view('interior.edit',['product' => $product, 'interior' => $interior]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'position' => 'required|numeric',
            'description' => 'required',
            'status' => 'required'
        ]);

        $interior = Interior::findOrFail($id);
        $interior_img = $interior ->image; 
        $interior->name = $request->name;
        $interior->product_id = $request->product_id;
        $interior->position = $request->position;
        $interior->description = $request->description;
        $interior->status = $request->status;
            if ($request->file('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg'
                    ]);
                if($interior_img){
                    Storage::delete('/public/'.$interior_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $interior_img =   $request->image->storeAs('interior',$imageName,'public');
                $interior->image = $interior_img;
            }              
            $interior->update();        
            return redirect('interior')->with('success', 'interior Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interior = Interior::findOrFail($id);
        $interior->delete();
        Storage::delete('/public/'.$interior->image);   
        return redirect('interior')->with('success','Interior deleted successfully');
    }
}
