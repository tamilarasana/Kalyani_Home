<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Walkthroughvedio;
use Storage;


class WalkthroughvedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walkthroughvedio = Walkthroughvedio::with('product')->get();
       return view('walkthrough.index', compact('walkthroughvedio'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::ALL();
        return view('walkthrough.create',['product' => $product]);
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
            'file' => 'required',
            'status' => 'required'
        ]); 

        if ($request->file('file')) {
            $imageName = time().'.'.$request->file->extension(); 
            $path=   $request->file->storeAs('walkthroughvedio',$imageName,'public');
            $walkthroughvedio_img = $path;
        }    
       $walkthroughvedio = new Walkthroughvedio;
       $walkthroughvedio->name = $request->name;
       $walkthroughvedio->product_id = $request->product_id;
       $walkthroughvedio->position = $request->position;
       $walkthroughvedio->description = $request->description;
       $walkthroughvedio->file = $walkthroughvedio_img;
       $walkthroughvedio->status = $request->status;
       $walkthroughvedio->save(); 
       return redirect('walkthroughvedio')->with('success', 'Walkthroughvedio Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Walkthroughvedio  $walkthroughvedio
     * @return \Illuminate\Http\Response
     */
    public function show(Walkthroughvedio $walkthroughvedio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Walkthroughvedio  $walkthroughvedio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walkthroughvedio = Walkthroughvedio::findOrFail($id) ;
        $product = Product::all();
        return view('walkthrough.edit',['product' => $product, 'walkthroughvedio' => $walkthroughvedio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Walkthroughvedio  $walkthroughvedio
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

        $walkthroughvedio = Walkthroughvedio::findOrFail($id);
        $walkthroughvedio_img = $walkthroughvedio ->file; 
        $walkthroughvedio->name = $request->name;
        $walkthroughvedio->product_id = $request->product_id;
        $walkthroughvedio->position = $request->position;
        $walkthroughvedio->description = $request->description;
        $walkthroughvedio->status = $request->status;
            if ($request->file('file')) {
                $request->validate([
                    'walkthroughvedio_img' => 'required'
                ]); 
                if($walkthroughvedio_img){
                    Storage::delete('/public/'.$walkthroughvedio_img);
                }
                $imageName = time().'.'.$request->file->extension();  
                $walkthroughvedio_img =   $request->file->storeAs('walkthroughvedio',$imageName,'public');
                $walkthroughvedio->file = $walkthroughvedio_img;
            }              
            $walkthroughvedio->update();        
            return redirect('walkthroughvedio')->with('success', 'Walkthroughvedio Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Walkthroughvedio  $walkthroughvedio
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
       $walkthroughvedio = Walkthroughvedio::findOrFail($id);
        $walkthroughvedio->delete();
        Storage::delete('/public/'.$walkthroughvedio->image);   
        return redirect('walkthroughvedio')->with('success', 'Walkthroughvedio Deleted Successfully.');
    }
}
