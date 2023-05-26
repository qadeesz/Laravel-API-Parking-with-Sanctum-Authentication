<?php

namespace App\Services;

use App\Models\Zone;
use Carbon\Carbon;

class ParkingPriceService
{
    public static function calculatePrice(int $zoon_id, string $startTime, string $stopTime = null)
    {
        $start = new Carbon($startTime);
        $stop = (!is_null($stopTime)) ? new Carbon($stopTime) : now();

        $totalTimeByMinutes = $stop->diffInMinutes($start);

        $priceByMuintes = Zone::find($zoon_id)->price_per_hour / 60;

        return ceil($totalTimeByMinutes * $priceByMuintes);
    }
}
