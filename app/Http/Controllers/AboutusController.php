<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = Aboutus::all();
        return view('aboutus.index',compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutus.create');
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
            'title' => 'required',
            'position' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('aboutus',$imageName,'public');
            $aboutus_img = $path;
        }    
       $aboutus = new Aboutus;
       $aboutus->title = $request->title;
       $aboutus->position = $request->position;
       $aboutus->description = $request->description;
       $aboutus->image = $aboutus_img;
       $aboutus->status = $request->status;
       $aboutus->save(); 
       return redirect('aboutus')->with('success', 'About Us Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutus $aboutus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus = Aboutus::findOrFail($id) ;
        return view('aboutus.edit',compact('aboutus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'required|numeric',
            'description' => 'required',
            'status' => 'required'
        ]);
      
        $aboutus = Aboutus::findOrFail($id);
        $aboutus_img = $aboutus ->image; 
        $aboutus->title = $request->title;
        $aboutus->position = $request->position;
        $aboutus->description = $request->description;
        $aboutus->status = $request->status;
            if ($request->file('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg'
                    ]);
                if($aboutus_img){
                    Storage::delete('/public/'.$aboutus_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $aboutus_img =   $request->image->storeAs('aboutus',$imageName,'public');
                $aboutus->image = $aboutus_img;
            }              
            $aboutus->update();        
             return redirect('aboutus')->with('success', 'About Us Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $aboutus = Aboutus::findOrFail($id);
        $aboutus->delete();
        Storage::delete('/public/'.$aboutus->image);   
        return redirect('aboutus')->with('success', 'About Us Deleted Successfully!');
    }
}
