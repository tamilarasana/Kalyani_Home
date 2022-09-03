@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')

<div class="block-header">
      <div class="row">
          <div class="col-lg-7 col-md-6 col-sm-12">
              <h2>Map Location
                  <small class="text-muted">Welcome to Kalyani Home Application</small>
              </h2>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
              <ul class="breadcrumb float-md-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0);" ><i  class="fa fa-home"></i> Kalyani Home</a></li>
                  <li class="breadcrumb-item active">Map Location </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container-fluid">
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                  <div class="header">
                    <a href="{{ route('maplocation.create') }}" class="btn  btn-sm btn-icon waves-effect waves-light btn-success float-right"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-plus"></i>
                              
                          </a>
                      <h2>Map Location</h2>
                  </div>
                  <div class="body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Product</th>
                                    <th>Map Link</th>
                                    <th>Data</th>
                                    <th>Descripation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Product</th>
                                    <th>Map Link</th>
                                    <th>Data</th>
                                    <th>Descripation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach($maplocation as $value)					
                                <tr>
                                     {{-- <td>{{ $value->location_name }}</td> --}}
                                     <td>{{Str::limit($value->location_name, 10, $end='.....')}}</td>
                                     <td>{{ $value->product->product_name }}</td>
                                     {{-- <td>{{ $value->map_link }}</td> --}}
                                     <td>{{Str::limit($value->map_link, 10, $end='.....')}}</td>
                                     <td>{{Str::limit($value->data, 10, $end='.....')}}</td>
                                     {{-- <td>{{ $value->data }}</td> --}}
                                     <td>{{Str::limit($value->description, 10, $end='.....')}}</td>
                                     {{-- <td>{{ $value->description }}</td> --}}
                                        @if($value->status == "active")
                                            <td>Active</td>
                                          @else
                                            <td>Un Active</td>
                                          @endif
                                          <td>
                                            <div class="form-button-action" style="display: flex" >
                                            <a class="btn  btn-sm btn-icon btn-info mr-1"  href="{{ route('maplocation.edit',$value->id) }}" >
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('maplocation.destroy',$value->id) }}" method="POST">       
                                                @csrf
                                                @method('DELETE')
                                    
                                                <button type="submit" class="btn btn-sm  btn-danger mr-1"><i class="fa fa-trash-o" ></i></button>
                                            </form>
                                            </div>
                                        </td>
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
  <script>
      $(document).ready(function() {
          toastr.options.timeOut = 1500;
          @if (Session::has('error'))
              toastr.error('{{ Session::get('error') }}');
          @elseif(Session::has('success'))
              toastr.success('{{ Session::get('success') }}');
          @endif
      });
  </script>

  @endsection   

