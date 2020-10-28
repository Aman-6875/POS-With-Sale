<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailyDetails;
use App\DailySale;
use App\Product;
use App\ProductDetail;
use App\Purchase;
use App\SalesMan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\Generator\Method;
use PHPUnit\Framework\Constraint\Exception;

class DailySaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return SalesMan::get();
        return view('pages.daily_sale.index')->with('users',SalesMan::get());
    }

    public function productView($id)
    {
        $product = Product::join('product_details','product_details.product_id','=','products.product_id')->get();
        return view('pages.daily_sale.product_sales')->with('products',$product)->with('sales_man_id',$id);
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



    public function testproductView(Request $request)
    {
      // return $request->sales_man_id;
          $product = Product::join('product_details','product_details.product_id','=','products.product_id')->get();
        return view('pages.daily_sale.test')->with('products',$product)->with('sales_man_id',$request->sales_man_id);
    }

   

    public function testproductData(Request $request)
    {

          $mytime =Carbon::now()->format('Y-m-d ');
      
        //return $request->all();

        if ($request->isMethod('post')) {
            
          $product_id=$request['product_id'];
          $salesman_id=$request['sales_man_id'];


          $product = Product::join('product_details','product_details.product_id','=','products.product_id')->where('products.product_id',$product_id)->first();
          $dailySale = [
            'product_id'=> $product->product_id,
            'sales_man_id'=> $salesman_id,
            'product_out'=> $request['product_out'],
            'rate'=> $product->product_retail_price, 
            'product_in'=> 0,
            'damage'=>0,
            'damage_value'=>0,
            'return'=>0,               
          ];
          $d = DailySale::where('product_id',$product_id)->where('sales_man_id',$request->salse_man_id)->whereDate('created_at',$mytime)->get();
          if(Count($d)<1){
            $d = DailySale::create($dailySale);
            Purchase::where('product_details_id',$request->product_id)->decrement('quantity', $request['product_out']);
            $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
            

            return [
                'status' => 'success',
                'products' => $data,
                'message' => 'successfully Saved'
            ];
        }
        else{
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
        //return $request->all();
       
        
          $mytime =Carbon::now()->format('Y-m-d ');
          $d = $request->except('product_id');
      
            DailySale::where('product_id',$request->product_id)->whereDate('created_at',$mytime)->update($d);
            $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();

          //  DB::table('purchases')->increment('quantity', $request['product_out']);
            if(!is_null($request['product_in'])){
                Purchase::where('product_details_id',$request->product_id)->increment('quantity', $request['product_in']);
            }
           if(!is_null($request['return'])){
            //return  $request['return'];
            Purchase::where('product_details_id',$request->product_id)->increment('quantity', $request['return']);
           }
           
     
      return [
            'status' => 'success',
            'products' => $data,
            'message' => 'updated  Successfully'
            ];

      
          
        }



        public function dailyDetails(Request $request)
        {

            //return $request->all();
            $mytime =Carbon::now()->format('Y-m-d ');

            if ($request->isMethod('post')) {
            
                $mytime =Carbon::now()->format('Y-m-d ');
             
          
          //  return $request->all();
            $dailyDetails = [
                'sales_man_id'=>$request['sales_man_id'],
                'product_id'=>$request['product_id'],
                'cash'=>$request['cash'],
                'claim'=>$request['claim'],
                'damage_value'=>$request['damage_value'],
                'due'=>$request['due'],
                'net_amount'=>$request['net_amount'],
                'total_amount'=> $request['total_amount'],
                              
              ];
              try {
               DailyDetails::create($dailyDetails);
               $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
                return[
                    'status' => 'success',
                    'datas' => $data,
                    'message' => 'Inserted  Successfully'
                ];
            } 
            catch (\Exception $exception) {
                return [
                    'status' => 'failed',
                    'datas' => $data,
                    'message' => 'error'
                ];
            }


              }
              else{
                  $data=  DailySale::join('products','daily_sales.product_id','=','products.product_id') ->whereDate('daily_sales.created_at',$mytime)->get();
                  
                  return [
                      'status' => 'failed',
                      'products' => $data,
                      'message' => 'successfully Saved'
                  ];
              }
              

  
        }
        public function report(Request $request){
              // return $request->all();
                $mytime =Carbon::now()->format('Y-m-d ');
                $products= Product::get();
                $salse_man_id = null;

                if(!is_null($request->from_date)){
                    
                    $mytime = Carbon::parse($request->from_date)->format('Y-m-d ');
                }
                if(!is_null($request->sales_man_id)){
                    
                    $salse_man_id = $request->sales_man_id;
                }
            
           
            
            return view('pages.daily_sale.daily_sale_report')
            ->with('products',$products)
            ->with('mytime',$mytime)
            ->with('sales_man_id',$salse_man_id)
            ->with('users',SalesMan::get());


            // if(is_null($request->form_date)){
            //     $data =  DailySale::join('products','daily_sales.product_id','=','products.product_id')
            //                     ->leftJoin('sales_men','daily_sales.sales_man_id','=','sales_men.sales_man_id')
            //                     ->leftJoin('daily_details','daily_sales.sales_man_id','=','daily_sales.sales_man_id')
            //                     ->whereDate('daily_sales.created_at',$mytime)->select('daily_sales.*','daily_details.*','sales_men.sales_man_name','products.product_name')->get();
            //  return view('pages.daily_sale.daily_sale_report')->with('products',$data);

            

        
            
        }
    
}
