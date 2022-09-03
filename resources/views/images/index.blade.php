@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')

<div class="block-header">
      <div class="row">
          <div class="col-lg-7 col-md-6 col-sm-12">
              <h2>Interior
                  <small class="text-muted">Welcome to Kalyani Home Application</small>
              </h2>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
              <ul class="breadcrumb float-md-right">
                  <li class="breadcrumb-item"><a href="index.html"><i  class="fa fa-home"></i> Kalyani Home</a></li>
                  <li class="breadcrumb-item active">Images </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container-fluid">
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                  <div class="header">
                    <a href="{{ route('images.create') }}" class="btn  btn-sm btn-icon waves-effect waves-light btn-success float-right"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-plus"></i>
                              
                          </a>
                      <h2>Images</h2>
                  </div>
                  <div class="body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                              </tfoot>
                              <tbody>

                            </tbody>
                              
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <p class="m-b-0">© 2022 Kalyani Home Admin by <a  href="javascript:void(0);"
                            target="black">Kalyani Home</a> </p>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')

