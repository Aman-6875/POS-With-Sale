@extends('layouts.admin_layout')

@section('title', 'Products Category')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ __("message.ProductsCategory") }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __("message.home") }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __("message.viewCategory") }}</a></li>
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>{{ __("message.viewCategory") }}</h4>

                    </div>
                    <div class="col-sm-6">
                        <a href="/product/category/create" class="btn btn-sm btn-primary pull-right"><i
                                    class="md md-add"></i> {{ __("message.AddNew") }}</a>
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
                            <th>{{ __("message.categoryName") }}</th>
                            <th>{{ __("message.categoryImage") }}</th>
                            <th>{{ __("message.Action") }}</th>
                        </tr>
                        </thead>


                        <tbody>
                        @php($i=1)
                        @foreach($result as $res)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$res->product_category_name}}</td>
                                <td><img src="/images/category/{{ $res->product_category_image }}" class="img-rounded"
                                         alt="Category image" width="150" height="80"></td>
                                <td>
                                    <button type="button"
                                            class="btn btn-sm btn-danger dropdown-toggle waves-effect waves-light"
                                            data-toggle="dropdown" aria-expanded="false">{{ __("message.Action") }}<span
                                                class="caret"></span></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="/product/category/edit/{{$res->product_category_id}}"><i
                                                    class="fa fa-edit"></i> {{ __("message.Edit") }}</a>
                                        <a class="dropdown-item"
                                           href="/product/category/destroy/{{$res->product_category_id}}"><i
                                                    class="fa fa-remove"></i> {{ __("message.Delete") }}</a>
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
    </div>
    <!-- end row -->

@endsection