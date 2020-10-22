@extends('layouts.admin_layout')

@section('title', 'Edit Products Category')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ __("message.ProductsCategory") }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __("message.home") }}</a></li>
                <li class="breadcrumb-item"><a href="#"> {{ __("message.editCategory") }}</a></li>
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">{{ __("message.editCategory") }}</h4>
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
                            <form class="form-horizontal" method="post" action="/product/category/update"
                                  enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.categoryName") }}</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="product_category_name"
                                               value="{{$result->product_category_name}}">
                                        <input type="hidden" class="form-control" name="_token"
                                               value="{{csrf_token()}}">
                                        <input type="hidden" class="form-control" name="product_category_id"
                                               value="{{$result->product_category_id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">{{ __("message.categoryImage") }}</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="image">

                                        <input type="hidden" class="form-control" name="image_name"
                                               value="{{$result->product_category_image}}">
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