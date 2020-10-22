<?php

function getPayment($invoice)
{

    return \App\Payment::where('invoice',$invoice)->sum('pay_amount');
}


?>