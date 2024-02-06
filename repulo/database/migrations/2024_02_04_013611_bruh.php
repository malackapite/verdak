<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared('
            CREATE TRIGGER flight_deleted
            BEFORE DELETE ON flights
            FOR EACH ROW
            BEGIN
                UPDATE travel
                SET evaluation = 1
                WHERE travel.flight_id = OLD.flight_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER flight_deleted');
    }
};
