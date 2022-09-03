@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Location
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="fa fa-home"></i> Kalyani Home</a></li>
                    <li class="breadcrumb-item active">Location</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <a href="{{ route('product.create') }}"
                            class="btn  btn-sm btn-icon waves-effect waves-light btn-success float-right"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus"></i>
                        </a>
                        <h2>Location</h2>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Product Type</th>
                                            <th>Location</th>
                                            {{-- <th>About</th> --}}
                                            {{-- <th>Description</th> --}}
                                            <th>Price</th>
                                            <th>Contact Number</th>
                                            {{-- <th>Remarks</th> --}}
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product </th>
                                            <th>Category</th>
                                            <th>Product Type</th>
                                            <th>Location</th>
                                            {{-- <th>About</th> --}}
                                            {{-- <th>Description</th> --}}
                                            <th>Price</th>
                                            <th>Contact Number</th>
                                            {{-- <th>Remarks</th> --}}
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($product as $value)
                                            <tr>
                                             
                                                <td>{{Str::limit($value->product_name , 10, $end='.....')}}</td>
                                                <td>{{Str::limit($value->category->name , 10, $end='.....')}}</td>
                                                <td>{{Str::limit($value->producttype->name , 9, $end='.....')}}</td>
                                                <td>{{Str::limit($value->location->name  , 10, $end='.....')}}</td>
                                                {{-- <td>{{ $value->about }}</td> --}}
                                                {{-- <td>{{ $value->description }}</td> --}}
                                                <td>{{ $value->price }}</td>
                                                <td>{{Str::limit($value->contact_num  , 10, $end='.....')}}</td>
                                                {{-- <td>{{ $value->remarks }}</td> --}}
                                                @if ($value->status == 'active')
                                                    <td>Active</td>
                                                @else
                                                    <td>Un Active</td>
                                                @endif
                                                {{-- <td>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                      <button type="button" class="btn btn-info">1</button>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                      <button type="button" class="btn btn-info">2</button>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                      <button type="button" class="btn btn-info">5</button>
                                                    </div>
                                                  </div>
                                              </td> --}}
                                                <td>
                                                    <div class="form-button-action" style="display: flex">
                                                        <a class="btn  btn-sm btn-icon btn-info mr-1"
                                                            href="{{ route('product.edit', $value->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('product.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm  btn-danger mr-1"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        {{-- <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product Type</th>
                                    <th>Location</th>
                                    <th>About</th>
                                    <th>Description</th>
                                    <th>Price</th>      
                                    <th>Contact Number</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product Type</th>
                                    <th>Location</th>
                                    <th>About</th>
                                    <th>Description</th>
                                    <th>Price</th>      
                                    <th>Contact Number</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach ($product as $value)					
                                <tr>
                                     <td>{{ $value->product_name }}</td>
                                     <td>{{ $value->category->name }}</td>
                                     <td>{{ $value->producttype->name }}</td>
                                     <td>{{ $value->location->name }}</td>
                                     <td>{{ $value->about }}</td>
                                     <td>{{ $value->description }}</td>
                                     <td>{{ $value->price }}</td>
                                     <td>{{ $value->contact_num }}</td>
                                     <td>{{ $value->remarks }}</td>
                                        @if ($value->status == 'active')
                                            <td>Active</td>
                                          @else
                                            <td>Un Active</td>
                                          @endif
                                    <td>
                                        <div class="form-button-action" style="display: flex" >
                                        <a class="btn  btn-sm btn-icon waves-effect waves-light btn-info"  href="{{ route('product.edit',$value->id) }}" >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('product.destroy',$value->id) }}" method="POST">       
                                            @csrf
                                            @method('DELETE')
                                
                                            <button type="submit" class="btn btn-sm  btn-danger "   ><i class="fa fa-trash-o" ></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                      </div>
                  </div> --}}
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
    @section('scripts')
        <script>
            $(document).ready(function() {
                toastr.options.timeOut = 1500;
                @if (Session::has('error'))
                    toastr.error('{{ Session::get('error') }}');
                @elseif (Session::has('success'))
                    toastr.success('{{ Session::get('success') }}');
                @endif
            });
        </script>
    @endsection
