<?php

namespace App\Observers;

use App\Models\Flight;
use Illuminate\Support\Facades\DB;

class FlightObserver
{
    /**
     * Handle the Flight "created" event.
     */
    public function created(Flight $flight): void
    {
        //
    }

    /**
     * Handle the Flight "updated" event.
     */
    public function updated(Flight $flight): void
    {
        //
    }

    /**
     * Handle the Flight "deleted" event.
     */
    public function deleted(Flight $flight): void
    {
        DB::table("travel")->where("flight_id", $flight->flight_id)
            ->update(["flight_id" => null, "evaluation" => 1]);
    }

    /**
     * Handle the Flight "restored" event.
     */
    public function restored(Flight $flight): void
    {
        //
    }

    /**
     * Handle the Flight "force deleted" event.
     */
    public function forceDeleted(Flight $flight): void
    {
        //
    }
}
