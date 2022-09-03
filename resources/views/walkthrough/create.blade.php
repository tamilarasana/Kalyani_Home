@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Walkthrough Vedio
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Walkthrough Vedio</a>
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
                        <h2> Walkthrough Vedio </h2>
                    </div>
                    <form action="{{URL::to('walkthroughvedio')}}" method = "post"  id="form_validation" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="body">
                        <label for="name">Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Enter your Name" required>
                                </div>
                                @if ($errors->has('name'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('name') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="product_id">Product</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="product_id" required>
                                        <option value="">Choose Our Category</option>
                                        @foreach($product as $key => $data)
                                        <option value="{{$data->id}}">{{$data->product_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('product_id'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('product_id') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="position">Position</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="position" class="form-control" name="position"
                                        placeholder="Enter your Position" required>
                                </div>
                                @if ($errors->has('position'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('position') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description" required></textarea>
                                </div>
                                @if ($errors->has('description'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('description') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="file">Vedio</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <input type="file" id="file" class="form-control" name="file" multiple  required/>
                                </div>
                                @if ($errors->has('file'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('file') }}</li>
                                </span>
                            @endif
                            </div>

                            <label for="status">Status</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="">-- Please select --</option>
                                        <option value="active">Active</option>
                                        <option value="unactive">Un Active</option>
                                    </select>
                                </div>
                                @if ($errors->has('status'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('status') }}</li>
                                </span>
                            @endif
                            </div>
                            <br>
                            <div class="card-action">
                                <button class="btn btn-success">Submit</button>
                                <a href ="{{url('/walkthroughvedio')}}" class="btn btn-danger">Cancel</a>
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

  
