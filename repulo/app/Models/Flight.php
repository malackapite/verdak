<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $primaryKey = 'flight_id';

    protected $fillable = [
        'date',
        'airline_id',
        'limit'
    ];

    public function airline(){
        return $this->belongsTo(Airline::class, 'flight_id', 'airline_id');
    }
}
