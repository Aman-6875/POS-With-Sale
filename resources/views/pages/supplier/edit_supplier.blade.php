@extends('layouts.admin_layout')

@section('title', 'Edit Supplier')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ __("message.Supplier") }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __("message.home") }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __("message.EditSupplier") }}</a></li>
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">{{ __("message.EditSupplier") }}</h4>
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

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" method="post" action="/supplier/update"
                                  enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.Name") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="supplier_name"
                                               value="{{$result->supplier_name}}">
                                        <input type="hidden" class="form-control" name="_token"
                                               value="{{csrf_token()}}">
                                        <input type="hidden" class="form-control" name="supplier_id"
                                               value="{{$result->supplier_id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.Email") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="supplier_email"
                                               value="{{$result->supplier_email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.Phone") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="supplier_phone"
                                               value="{{$result->supplier_phone}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.Address") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="supplier_address"
                                               value="{{$result->supplier_address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.Company") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="supplier_company"
                                               value="{{$result->supplier_company}}">
                                    </div>
                                </div>

                                <div class="form-group mb-0 justify-content-end row">
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">{{ __("message.Save") }}
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