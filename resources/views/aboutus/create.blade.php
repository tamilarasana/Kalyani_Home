@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    About Us
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="zmdi zmdi-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">About US</a>
                    </li>
                    <li class="breadcrumb-item active">About Us Form Elements</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> About Us </h2>
                    </div>
                    <form action="{{URL::to('aboutus')}}" method = "post"  enctype="multipart/form-data" >
                        {{csrf_field()}}
                    <div class="body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter your Title">
                                </div>
                                @if ($errors->has('title'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('title') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="position">Position</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="position" class="form-control" name="position"
                                        placeholder="Enter your Position">
                                </div>
                                @if ($errors->has('position'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('position') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description"></textarea>
                                </div>
                                @if ($errors->has('description'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('description') }}</li>
                                </span>
                                @endif
                            </div>
                            <label for="image">Image</label>
                            <div class="form-group">
                                <div class="fallback">
                                    <input type="file" id="image" class="form-control" name="image" multiple />
                                </div>
                                @if ($errors->has('image'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('image') }}</li>
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
                                <a href ="{{url('/aboutus')}}" class="btn btn-danger">Cancel</a>
                            </div>
                            {{-- <button type="button" class="btn btn-raised btn-primary m-t-15 waves-effect">Submit</button> --}}
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
