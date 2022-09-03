@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')

<div class="block-header">
      <div class="row">
          <div class="col-lg-7 col-md-6 col-sm-12">
              <h2>Enquery
                  <small class="text-muted">Welcome to Kalyani Home Application</small>
              </h2>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
              <ul class="breadcrumb float-md-right">
                  <li class="breadcrumb-item"><a href="index.html"><i  class="fa fa-home"></i> Kalyani Home</a></li>
                  <li class="breadcrumb-item active">Enquery </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container-fluid">
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                  <div class="header">
                    <a href="#" class="btn  btn-sm btn-icon waves-effect waves-light btn-success float-right"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-plus"></i>
                              
                          </a>
                      <h2>Enquery</h2>
                  </div>
                  <div class="body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Message</th>
                                    <th>Remarks</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Message</th>
                                    <th>Remarks</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach($enquiry as $value)					
                                <tr>
                                     <td>{{ $value->name }}</td>
                                     <td>{{ $value->email }}</td>
                                     <td>{{ $value->phone }}</td>
                                     <td>{{ $value->name }}</td>
                                     <td>{{ $value->message }}</td>
                                     <td>{{ $value->remarks }}</td>                                       
                                    {{-- <td>
                                        <form action="{{ route('enquery.destroy',$value->id) }}" method="POST">       
                                            <a class="btn  btn-sm btn-icon waves-effect waves-light btn-info"  href="{{ route('enquery.edit',$value->id) }}" data-toggle="tooltip" data-original-title="Edit The Data"><i class="fa fa-edit"></i>
                                            </i>
                                            </i>
                                            </i></a>
                                            @csrf
                                            @method('DELETE')
                                
                                            <button type="submit" class="btn btn-sm btn-icon waves-effect waves-light btn-danger" data-toggle="tooltip" data-original-title="Delete Data"  ><i class="fa fa-trash-o" ></i></button>
                                        </form>
                                    </td> --}}
                                </tr>
                                 @endforeach
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

