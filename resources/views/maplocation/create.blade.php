@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Map Location
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Map Location</a>
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
                        <h2> Map Location </h2>
                    </div>
                    <form action="{{ URL::to('maplocation') }}" method="post" enctype="multipart/form-data" id="form_validation">
                        {{ csrf_field() }}
                        <div class="body">
                            <label for="location_name">Location Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="location_name" class="form-control" name="location_name"
                                        placeholder="Enter your Location Name" required>
                                </div>
                                @if ($errors->has('location_name'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('location_name') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="product_id">Product</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="product_id" required>
                                        <option value="">Choose Our Category</option>
                                        @foreach ($product as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('product_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('product_id') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="map_link">Map Link</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="map_link" class="form-control" name="map_link"
                                        placeholder="Enter your Map Link">
                                </div>
                                @if ($errors->has('map_link'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('map_link') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="data">Data</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="data" class="form-control" name="data"
                                        placeholder="Enter your Data">
                                </div>
                                @if ($errors->has('data'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('data') }}</li>
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
                                <a href="{{ url('/maplocation') }}" class="btn btn-danger">Cancel</a>
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
