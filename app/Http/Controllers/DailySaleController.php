<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailySale;
use App\Product;
use App\ProductDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DailySaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.daily_sale.index')->with('users',Customer::get());
    }

    public function productView()
    {
        $product = Product::join('product_details','product_details.product_id','=','products.product_id')->get();
        return view('pages.daily_sale.product_sales')->with('products',$product);
    }

    public function productResult(Request $request)
    {  
          $rate= ProductDetail::select('product_retail_price')->where('product_id',$request->product_id)->first();
        
        $dailySale = [
            'product_id'=> $request->product_id,
            'product_out'=> $request->out,
            'rate'=> $rate->product_retail_price,      
        ];
        DailySale::create($dailySale);

        $data = DailySale::join('products','daily_sales.product_id','=','products.product_id')->orderBy('daily_sales.created_at')->get();
        return view('pages.daily_sale.product_sales_results')->with('dailySales',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailySale  $dailySale
     * @return \Illuminate\Http\Response
     */
    public function show(DailySale $dailySale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailySale  $dailySale
     * @return \Illuminate\Http\Response
     */
    public function edit(DailySale $dailySale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailySale  $dailySale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailySale $dailySale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailySale  $dailySale
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailySale $dailySale)
    {
        //
    }



    public function testproductView()
    {
          
          $product = Product::join('product_details','product_details.product_id','=','products.product_id')->get();
        return view('pages.daily_sale.test')->with('products',$product);
    }

   

    public function testproductData(Request $request)
    {

          $mytime =Carbon::now()->format('Y-m-d ');
      
        //return $request->all();

        if ($request->isMethod('post')) {
            
          $product_id=$request['product_id'];


          $product = Product::join('product_details','product_details.product_id','=','products.product_id')->where('products.product_id',$product_id)->first();
          $dailySale = [
            'product_id'=> $product->product_id,
            'product_out'=> $request['product_out'],
            'rate'=> $product->product_retail_price, 
            'product_in'=> 0,
            'damage'=>0,
            'damage_value'=>0,
            'return'=>0,               
          ];
          $d = DailySale::where('product_id',$product_id)->whereDate('created_at',$mytime)->get();
        if(Count($d)<1){
            $d = DailySale::create($dailySale);
            $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
            

            return [
                'status' => 'success',
                'products' => $data,
                'message' => 'successfully Saved'
            ];
        }else{
            $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
            
            return [
                'status' => 'failed',
                'products' => $data,
                'message' => 'successfully Saved'
            ];

        }
          
        }


        $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
            
        return [
            'status' => 'success',
            'products' => $data,
            'message' => 'successfully Saved'
        ];

    }






    public function testproductDataUpdate(Request $request)
    {

          $mytime =Carbon::now()->format('Y-m-d ');
         $d = $request->except('product_id');
      
            DailySale::where('product_id',$request->product_id)->whereDate('created_at',$mytime)->update($d);
            $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
     
      return [
            'status' => 'success',
            'products' => $data,
            'message' => 'updated  Successfully'
            ];

      
          
        }
    
}
