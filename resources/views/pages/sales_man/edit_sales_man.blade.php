@extends('layouts.admin_layout')

@section('title', 'Edit Sales Man')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Sales Man</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Sales Man</a></li>
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Edit Sales Man</h4>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" method="post" action="/sales-man/update"
                                  enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sales Man Name</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="sales_man_name"
                                               value="{{$result->sales_man_name}}">
                                        <input type="hidden" class="form-control" name="_token"
                                               value="{{csrf_token()}}">
                                        <input type="hidden" class="form-control" name="sales_man_id"
                                               value="{{$result->sales_man_id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sales Man Email</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="sales_man_email"
                                               value="{{$result->sales_man_email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sales Man Image</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="image" id="img">

                                        <input type="hidden" class="form-control" name="image_name"
                                               value="{{$result->sales_man_image}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sales Man Phone</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="sales_man_phone"
                                               value="{{$result->sales_man_phone}}">
                                    </div>
                                </div>

                               
                                <div class="form-group mb-0 justify-content-end row">
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection