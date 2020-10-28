<?php

use App\DailyDetails;
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

function getInData($product_id, $mytime, $sales_man_id)
{
    $query=DailySale::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('product_in');
}

function getDamageData($product_id, $mytime, $sales_man_id)
{
    $query=DailySale::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('damage');
}

function getDamageValueData($product_id, $mytime, $sales_man_id)
{
    $query=DailySale::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('damage_value');
}

function getTotalAmountData($product_id, $mytime, $sales_man_id)
{
    $query=DailyDetails::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('total_amount');
}

function getClaimData($product_id, $mytime, $sales_man_id)
{
    $query=DailyDetails::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('claim');
}

function getNetAmountData($product_id, $mytime, $sales_man_id)
{
    $query=DailyDetails::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('net_amount');
}
function getDueData($product_id, $mytime, $sales_man_id)
{
    $query=DailyDetails::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('due');
}

function getCashData($product_id, $mytime, $sales_man_id)
{
    $query=DailyDetails::where('product_id', $product_id)->whereDate('created_at', $mytime);
    if($sales_man_id!=null){
        $query->where('sales_man_id', $sales_man_id);
    }

    return $query->sum('cash');
}


?>