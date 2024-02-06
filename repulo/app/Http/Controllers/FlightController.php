<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    //

    public function destroy($id){
        $a = Flight::find($id)->delete();
    }

    public function osszesJarat($id){
        return Flight::with("airline")->where("airline_id","=",$id)->get();
    }

    public function jaratTorol($name){
        return DB::table('flights')
        ->join("airlines", "flights.airline_id", "=", "airlines.airline_id")
        ->where('name', '=', $name)
        ->where("date", date("Y-m-d"))
        ->delete();
    }
}
