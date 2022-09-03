<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Broucher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Storage;


class BroucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broucher = Broucher::with('product')->get();
        return view('broucher.index',compact('broucher'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product =  Product::all();
        return view ('broucher.create')->with('product',$product);
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
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]); 

        if ($request->file('file')) {
            $imageName = time().'.'.$request->file->extension(); 
            $path=   $request->file->storeAs('broucher',$imageName,'public');
            $broucher_img = $path;
        }    
       $broucher = new Broucher;
       $broucher->name = $request->name;
       $broucher->product_id = $request->product_id;
       $broucher->description = $request->description;
       $broucher->file = $broucher_img;
       $broucher->status = $request->status;
       $broucher->save(); 
        return redirect('broucher')->with('success', 'Broucher Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Broucher  $broucher
     * @return \Illuminate\Http\Response
     */
    public function show(Broucher $broucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broucher  $broucher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $broucher = Broucher::findOrFail($id);
        $product =  Product::all(); 
        return view('broucher.edit',['broucher' => $broucher,'product' => $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broucher  $broucher
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
      
        $broucher = Broucher::findOrFail($id);
        $broucher_img = $broucher ->file; 
        $broucher->name = $request->name;
        $broucher->product_id = $request->product_id;
        $broucher->description = $request->description;
        $broucher->status = $request->status;
            if ($request->file('file')) {
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                if($broucher_img){
                    Storage::delete('/public/'.$broucher_img);
                }
                $imageName = time().'.'.$request->file->extension();  
                $broucher_img =   $request->file->storeAs('broucher',$imageName,'public');
                $broucher->file = $broucher_img;
            }              
            $broucher->update();        
            return redirect('broucher')->with('success', 'Broucher Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broucher  $broucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $broucher = Broucher::findOrFail($id);
        $broucher->delete();
        Storage::delete('/public/'.$broucher->file); 
        return redirect('broucher')->with('success', 'Broucher Deleted successfully.');
    }
}
