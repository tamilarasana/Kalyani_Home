<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Fullview;
use Illuminate\Http\Request;

class FullviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fullview = Fullview::with('product')->get();

        return view('fullview.index', compact('fullview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::ALL();
        return view('fullview.create',['product' => $product]);
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
            'position' => 'required|numeric',
            'product_id' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);
        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('fullview',$imageName,'public');
            $fullview_img = $path;
        }    
       $fullview = new Fullview;
       $fullview->name = $request->name;
       $fullview->product_id = $request->product_id;
       $fullview->position = $request->position;
       $fullview->description = $request->description;
       $fullview->image = $fullview_img;
       $fullview->status = $request->status;
       $fullview->save(); 
       return redirect('fullview')->with('success', 'Fullview Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fullview  $fullview
     * @return \Illuminate\Http\Response
     */
    public function show(Fullview $fullview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fullview  $fullview
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fullview = Fullview::findOrFail($id);
        $product = Product::all();
        return view('fullview.edit',['product' => $product, 'fullview' => $fullview]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fullview  $fullview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required|numeric',
            'product_id' => 'required|numeric',
            'description' => 'required',
            'status' => 'required'
        ]);

         $fullview = Fullview::findOrFail($id);
        $fullview_img = $fullview ->image; 
        $fullview->name = $request->name;
        $fullview->product_id = $request->product_id;
        $fullview->position = $request->position;
        $fullview->description = $request->description;
        $fullview->status = $request->status;
            if ($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                ]);
                if($fullview_img){
                    Storage::delete('/public/'.$fullview_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $fullview_img =   $request->image->storeAs('fullview',$imageName,'public');
                $fullview->image = $fullview_img;
            }              
            $fullview->update();        
            return redirect('fullview')->with('success', 'Fullview Updated Fuccessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fullview  $fullview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fullview = Fullview::findOrFail($id);
        $fullview->delete();
        Storage::delete('/public/'.$fullview->image);   
        return redirect('fullview')->with('success', 'Fullview Deleted Successfully.');
    }
}
