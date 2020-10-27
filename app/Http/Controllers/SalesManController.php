<?php

namespace App\Http\Controllers;

use App\SalesMan;
use Illuminate\Http\Request;

class SalesManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.sales_man.show_sales_man')->with('result', SalesMan::get());
    }


    public function create()
    {

        return view('pages.sales_man.create_sales_man');
    }


    //Need to update below functions
    public function store(Request $request)
    {

        
        unset($request['_token']);
        $request->validate([
            'sales_man_phone' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sales_man');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = 'default.jpg';
        }

       

        //return $request->all();
       // return $request->except('image');
        try {
            SalesMan::create($request->except('image'));
            return back()->with('success', "New Sales Man Created");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', "There was a problem. " . $exception->getMessage());
        }
    }


    // public function show(Vat $vat)
    // {
    //     //
    // }


    public function edit($sales_man_id)
    {
        return view('pages.sales_man.edit_sales_man')->with('result', SalesMan::where('sales_man_id', $sales_man_id)->first());
    }


    public function update(Request $request)
    {

        $sales_man_id = $request['sales_man_id'];
        unset($request['_token']); //Remove Token
        unset($request['sales_man_id']);//Remove token
       

        if ($request->hasFile('image')) {

            
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sales_man');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $request['image_name'];
        }


        unset($request['image_name']);//Remove token
        $request->request->add(['sales_man_image' => $image_name]);
      
        //return $request->all();
        try {

            SalesMan::where('sales_man_id', $sales_man_id)->update($request->except('image'));
            return redirect('/sales-man/show')->with('success', "Sales Man Details Updated");
        } catch (\Exception $exception) {
            return redirect('/sales-man/show')->with('failed', "There was a problem. " . $exception->getMessage());
        }

    }

    public function destroy($sales_man_id)
    {
        try {
            SalesMan::where('sales_man_id', $sales_man_id)->delete();
            return back()->with('success', "Sales Man Deleted");
        } catch (\Exception $exception) {
            return back()->with('failed', "There was a problem. " . $exception->getMessage());
        }
    }
}
