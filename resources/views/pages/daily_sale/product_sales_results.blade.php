@extends('layouts.admin_layout')

@section('title', 'Show Sells')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="panel-body">
                   
                       <form method="GET" action="/daily-sale/product/result">
                        <div class="row">
                         {{-- <div class="col-md-5">
                                <select class="selectized" name="product_id">
                                    @foreach( $products as $product)
                                         <option value="{{ $product->product_id}}">
                                             {{ $product->product_name }}
                                         </option>
                                     @endforeach

                                </select>
                         </div>  --}}
                         
                         <div class="form-group row">
                            <label class="col-2 col-form-label">Out</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="out">
                            </div>
                        </div>                 
                         <div class="col-2">
                                    <button  type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                         </div>
                        </div>
                       </form>
                 
                     

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Nmae</th>                                      
                                        <th>Out</th>                                      
                                        <th>In</th>                                      
                                        <th>Sales</th>                                      
                                        <th>Rate</th>                                       
                                        <th>Amount</th>                                       
                                        <th>Return</th>                                       
                                        <th>Damage</th>                                       
                                        <th>Damage Value</th>                                       
                                    </tr>
                                    </thead>
                               @foreach ($dailySales as $product)
                                   
                             
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                       
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->product_out}}</td>
                                                <td>{{$product->product_in}}</td>
                                                
                                                @php
                                                 $out=$product->product_out;
                                                 $in=$product->product_in;
                                                $sale = $out-$in;
                                                @endphp 
                                              
    
                                                <td>{{$sale}}</td>
                                                <td>{{$product->rate}}</td>
                                               
                                                  @php
                                                    $amount= $sale * $product->rate;  
                                                  @endphp
                                                <td>{{ $amount }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                           
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        </div>

    </div>

    <!-- end row -->


@endsection