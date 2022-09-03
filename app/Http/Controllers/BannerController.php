<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Storage;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $banner = Banner::all(); 
        return view('banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('banner.create');
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
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);
       
        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('banner',$imageName,'public');
            $banner_img = $path;
        }    
       $banner = new Banner;
       $banner->name = $request->name;
       $banner->position = $request->position;
       $banner->description = $request->description;
       $banner->image = $banner_img;
       $banner->status = $request->status;
       $banner->save(); 
        return redirect('banner')->with('success', 'Banner Created successfully!');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id) ;
        return view('banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
            'name' => 'required',
            'position' => 'required|numeric',
            'description' => 'required',
            'status' => 'required'
        ]);
      
        $banner = Banner::findOrFail($id);
        $banner_img = $banner ->image; 
        $banner->name = $request->name;
        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->status = $request->status;
            if ($request->file('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                    ]);
                if($banner_img){
                    Storage::delete('/public/'.$banner_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $banner_img =   $request->image->storeAs('banner',$imageName,'public');
                $banner->image = $banner_img;
            }              
            $banner->update();        
             return redirect('banner')->with('success', 'Banner Updated successfully!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Storage::delete('/public/'.$banner->image);   
        return redirect('banner')->with('success', 'Banner Deleted successfully!');

    }
}
