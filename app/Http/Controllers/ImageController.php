<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Storage;
use Str;



class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images =  Image::with('product')->get();
        return view('images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product =  Product::all();
        return view('images.create',['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $imagename = Str::random($length = 10);
        if ($request->file('images')) {
            $files = $request->file('images');
            foreach ($files as $key => $file)
            {
                $image = $imagename.'_'.$key .'_'.time().'.'. $file->getClientOriginalExtension();
                //  $imageName = time().'.'.$key .'.'.$file->extension(); 
                $path=   $file->storeAs('images',$image,'public');
                $mulit_img = $path;
                $data['product_id'] = $request->product_id;
                $data['images'] = $mulit_img;
                $images = Image::create($data);
             }
        } 
        return redirect('images')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(image $image)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::finOrFail($id);
        $product =  Product::all();
        return view('images.edit',['image' => $image, 'produc' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(image $image)
    {
        //
    }
}
