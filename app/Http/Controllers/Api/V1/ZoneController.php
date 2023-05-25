<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ZoneResourcce;

class ZoneController extends Controller
{
    public function index()
    {
        return ZoneResourcce::collection(Zone::all());
    }
}
