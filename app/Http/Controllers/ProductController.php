<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Image;
use App\Models\Producttype;
use Illuminate\Http\Request;
use DB;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category','location','producttype','images')->get();
       return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $location = Location::all();
       $producttype =  Producttype::all();
       return view('product.create',['location' => $location, 'category' => $category,'producttype' => $producttype]);
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
            'product_name' => 'required',
            'category_id' => 'required',
            'producttype_id' => 'required',
            'about' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'price' => 'required|alpha_num', 
            'contact_num' => 'required|numeric',  
            // 'images' => 'required|image|mimes:jpeg,png,jpg',
            'remarks' => 'required',  
            'status' => 'required'
        ]);
        
        // $product  =  new Product;
        // $product->product_name = $request ->product_name;
        // $product->category_id = $request ->category_id;
        // $product->producttype_id = $request ->producttype_id;
        // $product->location_id = $request ->location_id;
        // $product->about = $request ->about;
        // $product->description = $request ->description;
        // $product->price = $request ->price;
        // $product->contact_num = $request ->contact_num;
        // $product->remarks = $request ->remarks;
        // $product->status = $request ->status;
        // $product->save();
       $product =  Product::create($request->all());
            if($request->has('images')){
                $files = $request->file('images');
                foreach ($files as $key => $file)
                {
                    $imageName = $key.'-'.time().'.'.$file->extension(); 
                    $path =  $file->storeAs('images',$imageName,'public');
                    $data['product_id'] = $product->id;
                    $data['images'] = $path;
                    $car = Image::create($data);
                }
                }
        return redirect('product')->with('success', 'Product created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id) ;
        $category = Category::all();
        $location = Location::all();
       $producttype =  Producttype::all();
       return view('product.edit',['product' => $product, 'location' => $location, 'category' => $category,'producttype' => $producttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'producttype_id' => 'required',
            'about' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'price' => 'required|alpha_num', 
            'contact_num' => 'required|numeric',  
            'remarks' => 'required',  
            'status' => 'required'
        ]);
        $product = Product::findOrFail($id);
        $product -> product_name = $request->product_name;
        $product -> category_id = $request->category_id;
        $product->producttype_id = $request->producttype_id;
        $product->about= $request->about;
        $product->location_id= $request->location_id;
        $product->description= $request->description;
        $product->price = $request->price;
        $product->contact_num = $request->contact_num;
        $product->remarks = $request->remarks;
        $product->status = $request->status;
        $product ->update();
        $product->update($request->all());
        if($request->has('images')){
            $img_del = Image::where('product_id',$id)->get();
            foreach($img_del as $img) {
                Storage::delete('/public/'.$img->images);
            }
            Image::where('product_id',$id)->delete();
            $files = $request->file('images');
            foreach ($files as $key => $file){
                $imageName = $key.'-'.time().'.'.$file->extension(); 
                $path =  $file->storeAs('images',$imageName,'public');
                DB::table('images')->where('id',$id)->insert([
                    'product_id' => $product->id,
                    'images' => $path,
                ]);
           }
        }
        return redirect('product')->with('success', 'Product Updated Successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $img_del = Image::where('product_id',$product->id)->get();
        foreach($img_del as $img) {
            Storage::delete('/public/'.$img->images);
        }
        Image::where('product_id',$product  ->id)->delete();
        $product->delete();
        return redirect('product')->with('success', 'Product Deleted Successfully.');
    }
}
