<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $blog  = Blog::all();
     return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('blog',$imageName,'public');
            $blog_img = $path;
        }    
       $blog = new Blog;
       $blog->title = $request->title;
       $blog->position = $request->position;
       $blog->description = $request->description;
       $blog->image = $blog_img;
       $blog->status = $request->status;
       $blog->save(); 
       return redirect('blog')->with('success', 'Blog Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'required|numeric',
            'description' => 'required',
            'status' => 'required'
        ]);

        $blog = Blog::findOrFail($id);
        $blog_img = $blog ->image; 
        $blog->title = $request->title;
        $blog->position = $request->position;
        $blog->description = $request->description;
        $blog->status = $request->status;
            if ($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                ]);
                if($blog_img){
                    Storage::delete('/public/'.$blog_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $blog_img =   $request->image->storeAs('blog',$imageName,'public');
                $blog->image = $blog_img;
            }              
            $blog->update();        
            return redirect('blog')->with('success', 'Blog Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Storage::delete('/public/'.$blog->image);  
        return redirect('blog')->with('success', 'Blog Deleted Successfully.');


    }
}
