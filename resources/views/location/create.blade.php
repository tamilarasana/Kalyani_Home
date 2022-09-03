@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Category
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Category</a>
                    </li>
                    {{-- <li class="breadcrumb-item active">Basic Form Elements</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Category</h2>
                    </div>
                    <form action="{{ URL::to('location') }}" method="post" enctype="multipart/form-data"
                        id="form_validation">
                        {{ csrf_field() }}
                        <div class="body">
                            <label for="status">Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" required
                                        placeholder="Enter your Name" required>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('name') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="category_id">Category</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="category_id" required>
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

                            <label for="about_location">About Location</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="about_location" class="form-control" name="about_location"
                                        placeholder="Enter your About Location" required>
                                </div>
                                @if ($errors->has('about_location'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('about_location') }}</li>
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
                                <a href="{{ url('/location') }}" class="btn btn-danger">Cancel</a>
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
