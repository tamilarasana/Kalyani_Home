@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>
                    Specification
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home"></i> Kalyani Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Specification</a>
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
                        <h2> Specification </h2>
                        <form action="{{ route('specification.update', $specification->id) }}" method="post"
                            id="form_validation"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="body">
                                <label for="spec_name">Spec Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="spec_name" class="form-control" name="spec_name"
                                            value="{{ $specification->spec_name }}" placeholder="Enter your Specification Name" required>
                                    </div>
                                    @if ($errors->has('spec_name'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('spec_name') }}</li>
                                    </span>
                                @endif
                                </div>
                                <label for="product_id">Product</label>
                                <div class="form-group form-float">
                                    <div class="fallback">
                                        <select class="form-control show-tick" name="product_id" required>
                                            @foreach ($product as $por)
                                                <option {{ $specification->product_id === $por->id ? 'selected' : '' }}
                                                    value="{{ $por->id }}">{{ $por->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('product_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('product_id') }}</li>
                                    </span>
                                @endif
                                </div>

                                <label for="spec_icon">Specification</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="spec_icon" class="form-control" name="spec_icon"
                                            value="{{ $specification->spec_icon }}" placeholder="Enter your Icon" required>
                                    </div>
                                    @if ($errors->has('spec_icon'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('spec_icon') }}</li>
                                    </span>
                                @endif
                                </div>

                                <label for="description">Description</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="description"
                                            required>{{ $specification->description }}</textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('description') }}</li>
                                    </span>
                                @endif
                                </div>

                                <label for="remark">Remarks</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remark" class="form-control" name="remark"
                                            value="{{ $specification->remark }}" placeholder="Enter your Remarks" required>
                                    </div>
                                    @if ($errors->has('remark'))
                                    <span class="text-danger">
                                        <li>Oops! {{ $errors->first('remark') }}</li>
                                    </span>
                                @endif
                                </div>

                                <label for="status">Status</label>
                                <div class="form-group form-float">
                                    <div class="fallback">
                                        <select class="form-control show-tick" name="status">
                                            <option value="">-- Please select --</option>
                                            <option value="active" @if ($specification->status == 'active') selected @endif>Active
                                            </option>
                                            <option value="unactive" @if ($specification->status == 'unactive') selected @endif>Un
                                                Active</option>
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
                                    <a href="{{ url('/specification') }}" class="btn btn-danger">Cancel</a>
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
