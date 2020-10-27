@extends('layouts.admin_layout')

@section('title', 'Show Sales Man')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Sales Man</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">View Sales Man</a></li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6">
                       
                        <h4>View Sales Man</h4>

                    </div>
                    <div class="col-sm-6">
                        <a href="/sales-man/create" class="btn btn-sm btn-primary pull-right"><i
                                    class="md md-add"></i> Add New</a>
                    </div>
                </div>

                <hr>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('success')}}!</strong>
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('failed')}}!</strong>
                    </div>
                @endif

                @if(isset($result))
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Sales Man Name</th>
                            <th>Sales Man Email</th>
                            <th>Sales Man Image</th>
                            <th>Sales Man Phone</th>
                            
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @php($i=1)
                        @foreach($result as $res)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$res->sales_man_name}}</td>
                                <td>{{$res->sales_man_email}}</td>
                                <td><img src="/images/sales-man/{{ $res->sales_man_image }}" class="img-rounded"
                                         alt="User image" width="150" height="80"></td>
                                <td>{{$res->sales_man_phone}}</td>
                                
                                <td>
                                    <button type="button"
                                            class="btn btn-sm btn-danger dropdown-toggle waves-effect waves-light"
                                            data-toggle="dropdown" aria-expanded="false">Action<span
                                                class="caret"></span></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="/sales-man/edit/{{$res->sales_man_id}}"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                        <a class="dropdown-item"
                                           href="/sales-man/destroy/{{$res->sales_man_id}}"><i
                                                    class="fa fa-remove"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col -->

@endsection