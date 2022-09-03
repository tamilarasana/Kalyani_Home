<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category:: all();
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');

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
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $path=   $request->image->storeAs('category',$imageName,'public');
            $category_img = $path;
        }    
       $category = new Category;
       $category->name = $request->name;
       $category->description = $request->description;
       $category->image = $category_img;
       $category->status = $request->status;
       $category->save(); 
       return redirect('category')->with('success', 'Category Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  Category::findOrFail($id) ;
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $category =  Category::findOrFail($id) ;
        $category_img = $category ->image; 
        $category->name =  $request->name;          
        $category->description =  $request->description;          
        $category->status =  $request->status;          
            if ($request->file('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                ]);

                if($category_img){
                    Storage::delete('/public/'.$category_img);
                }
                $imageName = time().'.'.$request->image->extension();  
                $category_img =   $request->image->storeAs('category',$imageName,'public');
                $category->image = $category_img;
            }   
        $category->update();        
        return redirect('category')->with('success', 'Category Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Storage::delete('/public/'.$category->image);   
        return redirect('category')->with('success','Category deleted successfully');
    }
}
