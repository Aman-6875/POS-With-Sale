@extends('layouts.admin_layout')

@section('title', 'Show Sells')

@section('content')

    <div class="row" ng-controller="serviceController">
        <div class="col-md-12">
            <div class="card-box">
                <div class="panel-body">
                   
                       <form >
                        <div class="row">
                            
                         <div class="col-md-4">
                                <select class="form-control selectized" name="product_id" ng-model="product_id" ng-change="productChange(product_id)">
                                   
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
                 
                     

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr>
                                        
                                        <th>Product Nmae</th>                                      
                                        <th>Out</th>                                      
                                        <th>In</th>                                      
                                        <th>Sales</th>                                      
                                        <th>Rate</th>                                       
                                        <th>Amount</th>                                       
                                        <th>Return</th>                                       
                                        <th>Damage</th>                                       
                                        <th>Damage Value</th>                                       
                                        <th>Action</th>                                       
                                    </tr>
                                    </thead>

                                
                                    <tbody>
                                      
                                      
                                       
                                            <tr ng-repeat="product in products" ng-cloak>

                                                
                                                <td> [- product.product_name -]</td>
                                                <td> [- product.product_out -]</td>
                                                <td> [- product.product_in -]</td>
                                                <td> [- product.product_out - product.product_in -]</td>

                                                <td> [- product.rate -]</td>
                                                <td> [- (product.product_out - product.product_in)*product.rate -]</td>
                                                <td> [- product.return -]</td>
                                                <td> [- product.damage -]</td>
                                                <td> [- product.damage_value -]</td>
                                                <td> <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal[- product.product_id -]">
                                                   Action
                                                </a>
                                                </td>
                                             
                                               

                                            <td> 
                                                <div class="modal fade" id="exampleModal[- product.product_id -]" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Out</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                            value="[- product.product_id -]"required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">In</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                           value="" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Return</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                           value="" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Damage</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                           value="" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Damage Value</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                            value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </td>

                                               


                                            
    
                                                  
                                            </tr>
                                        
                                    </tbody>
                                
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        </div>

    </div>



   <!-- end row -->



    <script>
         let tempData = [];
         app.controller('serviceController', function ($scope, $http, toaster) {
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

            $scope.outModel = function () {
                console.log('lol');
                
              
            };

            $scope.add = function(){
               
              
                $http({
                        url: '/daily-sale/product/data',
                        method: "POST",
                        data: { 
                            product_out: $scope.out,
                            product_id: $scope.product_id,
                         }
                    })
                    .then(function(response) {
                            // success
                            console.log(response.data);

                            if(response.data.status=="success"){
                                $scope.products=response.data.products;
                                toaster.pop('success',"Successfully Product Added");
                            }else{
                                toaster.pop('error',"Product Already Added");
                            }
                           
                    }, 
                    function(response) { // optional
                            // failed
                            console.log(response.data);
                            toaster.pop('error',"There is an error, try later");
                    });
               
            };

            $http({
                        url: '/daily-sale/product/data',
                        method: "GET",
                        data: { 
                            product_out: $scope.out,
                            product_id: $scope.product_id,
                         }
                    })
                    .then(function(response) {
                            // success
                            console.log(response.data);

                            $scope.products=response.data.products;
                    }, 
                    function(response) { // optional
                            // failed
                            console.log(response.data);
                    });
            
         });



    </script>

@endsection