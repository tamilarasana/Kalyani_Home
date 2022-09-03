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
                        <a href="javascript:void(0);"><i class="fa fa-home"></i> Kalyani Home</a>
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
                    <form action="{{ route('category.update', $category->id)}}" method = "post" id="form_validation"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $category->name}}" 
                                        placeholder="Enter your Name" required>
                                </div>
                                @if ($errors->has('name'))
                                <span class="text-danger">
                                    <li>Oops! {{ $errors->first('name') }}</li>
                                </span>
                            @endif
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description" required>{{$category->description}}</textarea>
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
                                    <img src="{{ asset('storage/'.$category->image) }}" width="50" height="50" alt="Banner Image" title="Banner Image" />
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
                                        <option value="active" @if($category->status == 'active') selected @endif>Active</option>
                                    <option value="unactive" @if($category->status == 'unactive') selected @endif>Un Active</option>
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
                                <a href="{{ url('/category') }}" class="btn btn-danger">Cancel</a>
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
