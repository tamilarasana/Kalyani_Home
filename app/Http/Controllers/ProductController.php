<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Producttype;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category','location','producttype')->get();
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
        Product::create($request->all());
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
    public function update(Request $request, Product $product)
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
        
        $product->update($request->all());
        return redirect('product')->with('success', 'Product Updated Successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product')->with('success', 'Product Deleted Successfully.');
    }
}
