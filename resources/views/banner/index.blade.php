@extends('layouts.master')
@section('title')
    Kalyani Motors
@endsection

@section('content')

    <div class="block-header" >
        {{-- style="padding-top: 6px; padding-bottom: 6px;" --}}
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Banner
                    <small class="text-muted">Welcome to Kalyani Home Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="fa fa-home"></i> Kalyani Home</a></li>
                    <li class="breadcrumb-item active">Banner</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <a href="{{ route('banner.create') }}"
                            class="btn  btn-sm btn-icon waves-effect waves-light btn-success float-right"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus"></i>

                        </a>
                        <h2>Banner</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Descripation</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Descripation</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($banner as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->position }}</td>
                                            @if ($value->status == 'active')
                                                <td>Active</td>
                                            @else
                                                <td>Mobile View</td>
                                            @endif
                                            <td>{{Str::limit($value->description, 10, $end='.....')}}</td>
                                            <td><img src="{{ asset('storage/' . $value->image) }}" width="50"
                                                    alt="Banner" title="Banner" /></td>
                                            <td>
                                                <form action="{{ route('banner.destroy', $value->id) }}" method="POST">
                                                    <a class="btn  btn-sm btn-icon  btn-info"
                                                        href="{{ route('banner.edit', $value->id) }}"><i
                                                            class="fa fa-edit"></i>
                                                        </i></a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-icon  btn-danger"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </form>
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

    {{-- <div class="block-header">
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
                        <h2>BASIC EXAMPLE</h2>
                        <ul class="header-dropdown">
                            <a href="{{ route('banner.create') }}" class="btn  btn-raised btn-info waves-effect "
                                aria-haspopup="true" aria-expanded="false">
                                Create
                            </a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
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
                        <p class="m-b-0">© 2017 Nexa Admin by <a href="http://thememakker.com/"
                                target="black">ThemeMakker</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

