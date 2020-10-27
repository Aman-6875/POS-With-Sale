@extends('layouts.admin_layout')

@section('title', 'Show Sells')
@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-inline" method="post" action="/daily-sale/report/product"
                                  enctype="multipart/form-data">

                                <div class="form-group col-md-4">
                                    <label class="col-5 col-form-label">From Date</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="from_date"
                                               placeholder="mm/dd/yyyy" id="datepicker-autoclose" required>
                                        <input type="hidden" class="form-control" name="_token"
                                               value="{{csrf_token()}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-5 col-form-label">To Date</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="to_date" placeholder="mm/dd/yyyy"
                                               id="datepicker" required>

                                    </div>
                                </div>


                                <div class="form-group mb-0 justify-content-end row col-md-4">
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>View Sells</h4>
                        @isset($from_date)
                        <span class="small">(from {{ $from_date }} to {{ $to_date }})</span>
                        @endisset

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

                @if(isset($products))
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                
                            <th>Product Name</th>
                            <th>Product Out</th>
                            <th>Product In</th>
                            <th>Product Sales</th>
                            <th>Product damages</th>
                            
                            <th>Product Total Amount</th>
                            <th>Product damage value</th>
                            <th>Claim</th>
                            <th>Due</th>
                            <th>Cash</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php($i=1)
                        @foreach($products as $product)
                         
                            
                            <tr>
                                <td>{{$i++}}</td>
                         
                                <td>{{$product->product_name}}</td>
                                <td>{{ getOutData($product->product_id, $mytime, $sales_man_id) }}</td>
                                // <td>{{$product->product_out}}</td>
                                // <td>{{$product->product_in}}</td>
                                // <td>{{$product->damage}}</td>
                                
                                // <td>{{$product->total_amount}}</td>
                                // <td>{{$product->damage_value}}</td>
                                // <td>{{$product->claim}}</td>
                                // <td>{{$product->net_amount}}</td>
                                // <td>{{$product->due}}</td>
                                // <td>{{$product->cash}}</td>
                                

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
