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
                    <form method="GET" class="form-inline" action="/daily-sale/product/">
                        <div class="form-group">
                           
                            <select class="form-control" name="sales_man_id">
                                @foreach( $users as $user)
                                <option value="{{ $user->sales_man_id}}">
                                    {{ $user->sales_man_name }}
                                </option>
                            @endforeach
                            </select>
                          </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Assign</button>
                          </div>

                            
                           

                    </form>
                     
                   

                </div>

                
            </div>
        </div>
    </div>

   


@endsection
