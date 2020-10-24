@extends('layouts.admin_layout')

@section('title', 'Show Sells')

@section('content')

    <div class="row" ng-controller="serviceController">
        <div class="col-md-12">
            <div class="card-box">
                <div class="panel-body">
                   
                       <form >
                        <div class="row">
                         <div class="col-md-5">
                                <select class="selectized" name="product_id" ng-model="product_id" ng-change="productChange(product_id)">
                                    @foreach( $products as $product)
                                         <option value="{{ $product->product_id}}">
                                             {{ $product->product_name }}
                                         </option>
                                     @endforeach

                                </select>
                         </div> 
                         <div class="form-group row">
                            <label class="col-2 col-form-label">Out</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="out" ng-model="out" ng-change="outChange(out)">
                            </div>
                        </div>                 
                         <div class="col-2">
                                    <button  type="submit" class="btn btn-info waves-effect waves-light" ng-click="add()">Add</button>
                         </div>
                        </div>
                       </form>
                 
                     

                    {{-- <div class="row">
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

                                @if (is_null($product))
                                    <tbody>
    
                                    </tbody>
                                @else
                                    <tbody>
                                        @if ($product!=null)
                                            @php
                                            $i=1;
                                            @endphp
                                       
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{ $out }}</td>
                                                @if ($in==null)
                                                    @php
                                                        $a=0;
                                                        $sale = $out-$a;
                                                    @endphp                                                   
                                                 <td>{{ $a }}</td>
                                                @else
                                                <td>{{ $in }}</td>
                                                @php
                                                $a=0;
                                                $sale = $out-$in;
                                                @endphp 
                                                @endif
    
                                                <td>{{ $sale }}</td>
                                                <td>{{$product->product_retail_price}}</td>
                                                  @php
                                                    $amount= $sale * $product->product_retail_price;  
                                                  @endphp
                                                <td>{{ $amount }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endif
                                    </tbody>
                                @endif
                                </table>
                            </div>
                        </div>
                    </div>    --}}
                </div>
            </div>

        </div>

    </div>

    <!-- end row -->



    <script>
         let tempData = [];
         app.controller('serviceController', function ($scope, $http) {
            console.log("jj");

            $scope.rate = 10;
            $scope.product_id = '';   
            $scope.in = 0;   
            $scope.out = 0;   
            $scope.rate = 0;


             $scope.outChange = function (out) {

                console.log("loll" + out);
               
                
            };

            $scope.productChange = function (product_id) {
                console.log('lol'+product_id);
              
            };

            $scope.add = function(){
                let tempData = [];
                tempData = {
                            'product_out' : $scope.out,
                            'product_in' : $scope.in,
                            'product_id' : $scope.product_id,
                            'rate' : $scope.rate,
                        };
                        console.log(tempData);
            };
         });

         

    </script>

@endsection