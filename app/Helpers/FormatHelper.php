<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait FormatHelper
{
    public function convertDateFormat($date)
    {
    	list($d, $m, $y) = explode('/', $date);
        return $y.'-'.$m.'-'.$d;
    }
}