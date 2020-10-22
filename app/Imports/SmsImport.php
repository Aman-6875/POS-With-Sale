<?php

namespace App\Imports;

use App\Sms;
use Maatwebsite\Excel\Concerns\ToModel;

class SmsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sms([
            //
        ]);
    }
}
