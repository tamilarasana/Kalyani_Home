@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Location
                    <small class="text-muted">Welcome to Kalyani Home  Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Location</a>
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
                    <form action="{{ route('location.update', $location->id)}}" method = "post"  enctype="multipart/form-data" id="form_validation">
                        @csrf
                        @method('PUT')
                        <div class="body">
                            <label for="status">Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $location->name}}" 
                                        placeholder="Enter your Name" required>
                                </div>
                            </div>

                            <label for="status">Category</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="category_id" required>
                                        @foreach($category as $cat)
                                        <option  {{ $location->category_id === $cat->id? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->name}}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>

                            <label for="status">About Location</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="about_location" value="{{ $location->about_location}}"
                                        placeholder="Enter your About Location" required>
                                </div>
                            </div>

                            <label for="status">Remarks</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="remarks" value="{{ $location->remarks}}"
                                        placeholder="Enter your Remarks" required>
                                </div>
                            </div>


                            <label for="status">Status</label>
                            <div class="form-group form-float">
                                <div class="fallback">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="">-- Please select --</option>
                                        <option value="active" @if($location->status == 'active') selected @endif>Active</option>
                                        <option value="unactive" @if($location->status == 'unactive') selected @endif>Un Active</option>
                                    </select>
                                </div>
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
