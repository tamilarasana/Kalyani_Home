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
                        <h2> Product Type </h2>
                    </div>
                    <form action="{{ URL::to('product') }}" method="post" id="form_validation"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="body">
                            <label for="product_name">Product Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="product_name" class="form-control" name="product_name"
                                        placeholder="Enter your Product Name" required>
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
                                    <select class="form-control show-tick" id="category_id" name="category_id" required>
                                        <option value="">Choose Our Category</option>
                                        @foreach ($category as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                                    <select class="form-control show-tick" id="producttype_id" name="producttype_id"
                                        required>
                                        <option value="">Choose Our Category</option>
                                        @foreach ($producttype as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                                    <select class="form-control show-tick" id="location_id" name="location_id" required>
                                        <option value="">Choose Our Category</option>
                                        @foreach ($location as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                                        placeholder="Enter your About" required>
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
                                        required></textarea>
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
                                        placeholder="Enter your Price" required>
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
                                        placeholder="Enter your Contact Number" required>
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
                                        placeholder="Enter your Remarks" required>
                                </div>
                                @if ($errors->has('remarks'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('remarks') }}</li>
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
                                <a href="{{ url('/Product') }}" class="btn btn-danger">Cancel</a>
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
