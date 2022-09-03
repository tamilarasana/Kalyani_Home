@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Basic Form Elements
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Forms</a>
                    </li>
                    <li class="breadcrumb-item active">Basic Form Elements</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> VERTICAL LAYOUT </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                        class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('aboutus.update', $aboutus->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="body">
                            <label for="title">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter your Name" value="{{ $aboutus->title }}">
                                </div>
                                @if ($errors->has('name'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('name') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="position">Position</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="position" class="form-control" name="position"
                                        placeholder="Enter your Position" value="{{ $aboutus->position }}">
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
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description">{{ $aboutus->description }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('description') }}</li>
                                </span>
                                @endif
                            </div>

                            <label for="image">Image</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <input type="file" id="image" class="form-control" name="image" multiple />
                                    <img src="{{ asset('storage/' . $aboutus->image) }}" width="50" hight="50"
                                        alt="Banner Image" title="Banner Image" />
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('image') }}</li>
                                    </span>
                                @endif
                            </div>
                            <label for="email_address">Status</label>
                            <select class="form-control show-tick" name="status" required>
                                <option value="">-- Please select --</option>
                                <option value="active" @if ($aboutus->status == 'active') selected @endif>Active</option>
                                <option value="unactive" @if ($aboutus->status == 'unactive') selected @endif>Un Active
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('status') }}</li>
                                </span>
                            @endif
                            <br><br>
                            <br>
                            <div class="card-action">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ url('/aboutus') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    <style>
        .btn-group.bootstrap-select.form-control.show-tick {
            border: none !important;
        }
    </style>

    @section('scripts')
