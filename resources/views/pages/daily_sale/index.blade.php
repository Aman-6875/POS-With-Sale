@extends('layouts.admin_layout')

@section('title', 'Show Daily Sales')
@section('content')
    <!-- Page-Title -->
    
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Sells</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Daily Sales</a></li>
                </ol>

            </div>
        </div>
   


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    
                        
                            <div class="col-md-3">

                                <select class=" form-control selectized" >
                                    @foreach( $users as $user)
                                         <option value="{{ $user->customer_id}}">
                                             {{ $user->customer_name }}
                                         </option>
                                     @endforeach

                                </select>

                            </div>

                            
                         <div class="col-3">
                                    <a  href="/daily-sale/product" type="submit" class="btn btn-info waves-effect waves-light">Assign
                                    </a>
                         </div>
                           

                        
                     
                   

                </div>

                
            </div>
        </div>
    </div>

   


@endsection
