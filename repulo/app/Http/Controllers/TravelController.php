<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    //

    public function userJaratai(){
        return Travel::with("flight.airline")->where("user_id",Auth::user()->id)->get();
    }

    public function bizonyosOrszag($orszag){
        return DB::table('travel')
            ->join('flights', 'travel.flight_id', '=', 'flights.flight_id')
            ->join('airlines', 'flights.airline_id', '=', 'airlines.airline_id')
            ->where('airlines.country', '=', $orszag)
            ->get();
    }
}
