@extends('layouts.admin_layout')

@section('title', 'Show Sells')

@section('content')

    <div class="row" ng-controller="serviceController">
        <div class="col-md-12">
            <div class="card-box">
                <div class="panel-body">

                    <form>
                        <div class="row">

                            <div class="col-md-3">
                                <select class="form-control selectized" name="product_id" ng-model="product_id"
                                        ng-change="productChange(product_id)">

                                    @foreach( $products as $product)
                                        <option value="{{ $product->product_id}}">
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Out</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="out" ng-model="out"
                                               ng-change="outChange(out)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light" ng-click="add()">
                                    Add
                                </button>
                            </div>
                            <div class="col-md-3">
                                @php
                                    use Carbon\Carbon;
                                    $date = Carbon::now()->format('l   dM  Y');

                                @endphp
                                <h3>{{$date}}</h3>
                            </div>


                            {{-- <div class="form-group row">
                               <label class="col-2 col-form-label">IN</label>
                               <div class="col-md-10">
                                   <input type="number" class="form-control" name="in" ng-model="in" ng-change="inChange(in)">
                               </div>
                           </div>                  --}}

                        </div>
                    </form>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr>

                                        <th>Product Name</th>
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


                                    <tr ng-repeat="product in products" ng-cloak
                                        ng-init="countInit((product.product_out-product.product_in)*product.rate)">


                                        <td> [- product.product_name -]</td>
                                        <td> [- product.product_out -]</td>
                                        <td> [- product.product_in -]</td>
                                        <td> [- product.product_out - product.product_in -]</td>

                                        <td> [- product.rate -]</td>
                                        <td> [- (product.product_out-product.product_in)*product.rate -]</td>
                                        <td> [- product.return -]</td>
                                        <td> [- product.damage -]</td>
                                        <td> [- product.damage_value -]</td>
                                        <td><a href="#" type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#exampleModal[- product.product_id -]"
                                               ng-click="action(product.product_out,product.product_in,product.return,product.damage,product.damage_value)">
                                                Action
                                            </a>
                                        </td>


                                        <td>
                                            <div class="modal fade" id="exampleModal[- product.product_id -]"
                                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Daily
                                                                Sales</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Out</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="out"
                                                                           ng-model="out_edit"
                                                                           value="[- product.product_out -]" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">In</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" name="in"
                                                                           ng-model="in_edit"
                                                                           value="[- product.product_in -]" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Return</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control"
                                                                           name="return" ng-model="return_edit"
                                                                           value="[- product.return -]" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Damage</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control"
                                                                           name="damage" ng-model="damage_edit"
                                                                           value="[- product.damage -]" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Damage Value</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control"
                                                                           name="damage_value"
                                                                           ng-model="damage_value_edit"
                                                                           value="[- product.damage_value -]" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="button" class="btn btn-primary"
                                                                    ng-click="saveData(out_edit,in_edit,return_edit,damage_edit,damage_value_edit,[product.product_id])">
                                                                Save changes
                                                            </button>
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


                    <p ng-bind="sub_total"></p>
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
            $scope.sub_total = 0;
            $scope.damage_value = 0;
            $scope.net_amount = 0;
            $scope.claim = 0;
            $scope.due = 0;
            $scope.cash = 0;


            $scope.outChange = function (out) {

                console.log("loll" + out);


            };


            $scope.productChange = function (product_id) {
                console.log('lol' + product_id);

            };


            $scope.add = function () {


                $http({
                    url: '/daily-sale/product/data',
                    method: "POST",
                    data: {
                        product_out: $scope.out,
                        product_id: $scope.product_id,
                    }
                })
                    .then(function (response) {
                            // success
                            console.log(response.data);

                            if (response.data.status == "success") {
                                $scope.products = response.data.products;
                                toaster.pop('success', "Successfully Product Added");
                            } else {
                                toaster.pop('error', "Product Already Added");
                            }

                        },
                        function (response) { // optional
                            // failed
                            console.log(response.data);
                            toaster.pop('error', "There is an error, try later");
                        });

            };

            $scope.saveData = function (out, inn, returnn, damage, damage_value, product_id) {
                console.log(out + "--" + inn + "--" + returnn + "--" + damage + "--" + damage_value + "--" + product_id);
                $('#modalwindow').modal('hide');
                $http({
                    url: '/daily-sale/product/data/update',
                    method: "post",
                    data: {
                        product_out: out,
                        product_in: inn,
                        damage: damage,
                        damage_value: damage_value,
                        return: returnn,
                        product_id: product_id,
                    }
                })
                    .then(function (response) {
                            // success
                            console.log(response.data);

                            $scope.products = response.data.products;
                            if (response.data.status == "success") {
                                $scope.products = response.data.products;
                                toaster.pop('success', "Successfully Updated");
                            } else {
                                toaster.pop('error', "There is a problem try next time");
                            }

                            //$('#exampleModal'+product_id).modal("hide");
                            //  $(".modal-fade").modal("hide");

                            $(".modal-fade").modal("hide");
                            $(".modal-backdrop").remove();

                            //  location.reload();


                        },

                        function (response) { // optional
                            // failed
                            console.log(response.data);
                            toaster.pop('error', "There is an error, try later");
                        });


            };

            $scope.action = function (out, inn, returnn, damage, damage_value) {
                console.log("fff");


                $scope.out_edit = out;
                $scope.in_edit = inn;
                $scope.return_edit = returnn;
                $scope.damage_edit = damage;
                $scope.damage_value_edit = damage_value;

            };

            $http({
                url: '/daily-sale/product/data',
                method: "GET",
                data: {
                    product_out: $scope.out,
                    product_id: $scope.product_id,
                }
            })
                .then(function (response) {
                        // success
                        console.log(response.data);

                        $scope.products = response.data.products;
                    },
                    function (response) { // optional
                        // failed
                        console.log(response.data);
                    });


            $scope.countInit = function (mTotal, damage_value) {

                $scope.sub_total = $scope.sub_total + mTotal;


                $scope.sub_total = 0;
                $scope.damage_value =$scope.damage_value+damage_value;
                $scope.net_amount = 0;
                $scope.claim = 0;
                $scope.due = 0;
                $scope.cash = 0;


            }

        });


    </script>

@endsection