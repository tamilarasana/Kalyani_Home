<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Exterior;
use Illuminate\Http\Request;
use Storage;


class ExteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exterior = Exterior::with('product')->get();
       return view('exterior.index', compact('exterior'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::ALL();
        return view('exterior.create',['product' => $product]);
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
            'position' => 'required',      
            'description' => 'required',      
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]); 

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('exterior',$imageName,'public');
            $exterior_img = $path;
        }    
       $exterior = new Exterior;
       $exterior->name = $request->name;
       $exterior->product_id = $request->product_id;
       $exterior->position = $request->position;
       $exterior->description = $request->description;
       $exterior->image = $exterior_img;
       $exterior->status = $request->status;
       $exterior->save(); 
       return redirect('exterior')->with('success', 'Exterior Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function show(Exterior $exterior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exterior = Exterior::findOrFail($id) ;
        $product = Product::all();
        return view('exterior.edit',['product' => $product, 'exterior' => $exterior]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'position' => 'required',      
            'description' => 'required',      
            'status' => 'required'
        ]); 
        
        $exterior = Exterior::findOrFail($id);
        $exterior_img = $exterior ->image; 
        $exterior->name = $request->name;
        $exterior->product_id = $request->product_id;
        $exterior->position = $request->position;
        $exterior->description = $request->description;
        $exterior->status = $request->status;
            if ($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]); 

                if($exterior_img){
                    Storage::delete('/public/'.$exterior_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $exterior_img =   $request->image->storeAs('exterior',$imageName,'public');
                $exterior->image = $exterior_img;
            }              
            $exterior->update();        
            return redirect('exterior')->with('success', 'Exterior Updated Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exterior = Exterior::findOrFail($id);
        $exterior->delete();
        Storage::delete('/public/'.$exterior->image);   
        return redirect('exterior')->with('success','Exterior Deleted Successfully');
    }
}
