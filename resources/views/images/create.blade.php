@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Images
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Images</a>
                    </li>
                    {{-- <li class="breadcrumb-item active">Banner Form Elements</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Images </h2>
                    </div>
                    <form action="{{URL::to('images')}}" method = "post"  enctype="multipart/form-data"  id="form_validation">
                        {{csrf_field()}}
                    <div class="body">
                            <label for="product_id">Product</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="product_id" required>
                                        <option value="">Choose Our Product</option>
                                        @foreach($product as $key => $data)
                                        <option value="{{$data->id}}">{{$data->product_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="image">Image</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <input type="file" id="image" class="form-control"   name="images[]"  multiple="multiple"  multiple  required/>
                                </div>
                            </div>
                            <br>
                            <div class="card-action">
                                <button class="btn btn-success">Submit</button>
                                <a href ="{{url('/images')}}" class="btn btn-danger">Cancel</a>
                            </div>
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

  
