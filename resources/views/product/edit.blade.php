@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Product
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Product </h2>
                    </div>
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data"
                        id="form_validation">
                        @csrf
                        @method('PUT')
                        <div class="body">
                            <label for="product_name">Product Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="product_name" class="form-control" name="product_name"
                                        value="{{ $product->product_name }}" placeholder="Enter your Product Name" required>
                                </div>
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('product_name') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="category_id">Category</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="category_id" required>
                                        @foreach ($category as $cat)
                                            <option {{ $product->category_id === $cat->id ? 'selected' : '' }}
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('category_id') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="producttype_id">Product Type</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="producttype_id" required>
                                        @foreach ($producttype as $pro_type)
                                            <option {{ $product->producttype_id === $pro_type->id ? 'selected' : '' }}
                                                value="{{ $pro_type->id }}">{{ $pro_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('producttype_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('producttype_id') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="location_id">Location</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="location_id" required>
                                        @foreach ($location as $loc)
                                            <option {{ $product->producttype_id === $loc->id ? 'selected' : '' }}
                                                value="{{ $loc->id }}">{{ $loc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('location_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('location_id') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="about">About</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="about" class="form-control" name="about"
                                        value="{{ $product->about }}" placeholder="Enter your About" required>
                                </div>
                                @if ($errors->has('about'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('about') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description"
                                        required>{{ $product->description }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('description') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="price">Price</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="price" class="form-control" name="price"
                                        value="{{ $product->price }}" placeholder="Enter your Price" required>
                                </div>
                                @if ($errors->has('price'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('price') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="contact_num">Contact Number</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="contact_num" class="form-control" name="contact_num"
                                        value="{{ $product->contact_num }}" placeholder="Enter your Contact Number"
                                        required>
                                </div>
                                @if ($errors->has('contact_num'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('contact_num') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="remarks">Remarks</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="remarks" class="form-control" name="remarks"
                                        value="{{ $product->remarks }}" placeholder="Enter your Remarks" required>
                                </div>
                                @if ($errors->has('remarks'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('remarks') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="status">Status</label>
                            <div class="form-group">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="">-- Please select --</option>
                                        <option value="active" @if ($product->status == 'active') selected @endif>Active
                                        </option>
                                        <option value="unactive" @if ($product->status == 'unactive') selected @endif>Un
                                            Active</option>
                                    </select>
                                </div>
                                @if ($errors->has('status'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('status') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="image">Image</label>
                            <div class="form-group">
                                <div class="fallback">
                                    <input type="file" id="image" class="form-control" name="images[]" multiple
                                         />
                                        @foreach ( $product->images as $image)
                                        <div class="pull-left">
                                           <img  src="{{ asset('storage/'.$image->images) }}"width ="50px" height="50px" alt="Image">&nbsp;
                                           <p class="text-center mt-1"> <a href="javascript:void(0);" class=" btn btn-danger btn-sm  delete" data-id="{{ $image->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a></p>

                                        </div>
                                        @endforeach
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('image') }}</li>
                                    </span>
                                @endif
                            </div>                                
                           
                        </div>
                        <br><br><br>
                        <div class="card-action"> 
                            <button class="btn btn-success ml-2">Submit</button>
                            <a href="{{ url('/Product') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .btn-group.bootstrap-select.form-control.show-tick {
        border: none !important;
    }

    /* .btn-group.bootstrap-select.form-control.show-tick.focused {
        border: none !important;
    } */
</style>


@section('scripts')

<script>
    $(".delete").on("click", function(){
        var id = $(this).attr("data-id");
        var confirmation = confirm("Are you sure you want to delete this Image?");
         if (confirmation) {
        $.ajax({ 
          url: "{{ route('destroy.image') }}",
          data: {"id": id,"_token": "{{ csrf_token() }}"},
          type: 'post',
          success: function(result){
              location.reload();
          }
        });
    }
    else{
        return false;
    }
});
  </script>
      @endsection   
 
