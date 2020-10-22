<?php


namespace App\Http\Controllers;


use Carbon\Carbon;

class DateFormat
{


    public static function getFormatteddate($date){
        return Carbon::parse($date)->format('Y/m/d');

    }
}