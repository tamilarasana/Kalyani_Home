@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Product Type
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Product Type</a>
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
                        <h2> Product Type </h2>
                    </div>
                    <form action="{{ route('producttype.update', $producttype->id) }}" method="post" id="form_validation"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="body">
                            <label for="status">Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ $producttype->name }}" placeholder="Enter your Name" required>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('name') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="status">Category</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="category_id" required>
                                        @foreach ($category as $cat)
                                            <option {{ $producttype->category_id === $cat->id ? 'selected' : '' }}
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

                            <label for="status">Location</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="location_id" required>
                                        @foreach ($location as $loc)
                                            <option {{ $producttype->location_id === $loc->id ? 'selected' : '' }}
                                                value="{{ $loc->id }}">{{ $loc->about_location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('location_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('location_id') }}</li>
                                    </span>
                                @endif
                            </div>

                            <label for="description">Description</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description"
                                        required>{{ $producttype->description }}</textarea>
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
                                        <option value="active" @if ($producttype->status == 'active') selected @endif>Active
                                        </option>
                                        <option value="unactive" @if ($producttype->status == 'unactive') selected @endif>Un Active
                                        </option>
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
                                <a href="{{ url('/producttype') }}" class="btn btn-danger">Cancel</a>
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

    {{-- @extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item active">Dashboard 1</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class="card-inside-title"> VERTICAL LAYOUT </h2>
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
                    <form>
                        <div class="body">
                            <label for="name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Enter your Name">
                                </div>
                            </div>
                            <label for="position">Position</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="position" class="form-control" name="position"
                                        placeholder="Enter your Position">
                                </div>
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description"></textarea>
                                </div>
                            </div>
                            <label for="description">Description</label>
                           
                                <div class="form-line">
                                <select class="form-control show-tick">
                                  <option value="">-- Please select --</option>
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="30">30</option>
                                  <option value="40">40</option>
                                  <option value="50">50</option>
                                </select>
                              </div>
                              
                               
                             
                            <br>
                            <button type="button" class="btn btn-raised btn-primary m-t-15 waves-effect">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <p class="m-b-0">© 2017 Nexa Admin by <a href="http://thememakker.com/"
                                target="black">ThemeMakker</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    button.btn.dropdown-toggle.bs-placeholder.btn-default {
    display: none;
}
button.btn.dropdown-toggle.btn-default {
    display: none;
}
.btn-group.bootstrap-select.form-control.show-tick {
    border: none !important;
}
.btn-group.bootstrap-select.form-control.show-tick.focused {
    border: none !important;
}
</style>

@section('scripts') --}}
