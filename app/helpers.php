<?php

use App\DailySale;

function getPayment($invoice)
{

    return \App\Payment::where('invoice',$invoice)->sum('pay_amount');
}

function getOutData($product_id, $mytime, $sales_man_id)
{
    $query=DailySale::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('product_out');
}


?>