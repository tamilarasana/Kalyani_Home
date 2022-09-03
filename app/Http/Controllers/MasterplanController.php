<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Masterplan;
use Illuminate\Http\Request;

class MasterplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterplan = Masterplan::with('product')->get();
        return view('masterplan.index', compact('masterplan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::ALL();
        return view('masterplan.create',['product' => $product]);
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);
       
        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('masterplan',$imageName,'public');
            $masterplan_img = $path;
        }    
       $masterplan = new Masterplan;
       $masterplan->name = $request->name;
       $masterplan->product_id = $request->product_id;
       $masterplan->description = $request->description;
       $masterplan->image = $masterplan_img;
       $masterplan->status = $request->status;
       $masterplan->save(); 
       return redirect('masterplan')->with('success', 'Master Plan Updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masterplan  $masterplan
     * @return \Illuminate\Http\Response
     */
    public function show(Masterplan $masterplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masterplan  $masterplan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterplan = Masterplan::findOrFail($id) ;
        $product = Product::all();
        return view('masterplan.edit',['product' => $product, 'masterplan' => $masterplan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masterplan  $masterplan
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
       
        $masterplan = Masterplan::findOrFail($id);
        $masterplan_img = $masterplan ->image; 
        $masterplan->name = $request->name;
        $masterplan->product_id = $request->product_id;
        $masterplan->description = $request->description;
        $masterplan->status = $request->status;
            if ($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                ]);
                if($masterplan_img){
                    Storage::delete('/public/'.$masterplan_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $masterplan_img =   $request->image->storeAs('masterplan',$imageName,'public');
                $masterplan->image = $masterplan_img;
            }              
            $masterplan->update();        
            return redirect('masterplan')->with('success', 'Master Plan Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masterplan  $masterplan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masterplan = Masterplan::findOrFail($id);
        $masterplan->delete();
        Storage::delete('/public/'.$masterplan->image);   
        return redirect('masterplan')->with('success','Master Plan Deleted successfully');
    }
}
