<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $primaryKey = 'travel_id';

    protected $fillable = [
        'evaluation',
        'flight_id',
        'user_id'
    ];

    public function flight(){
        return $this->hasMany(Flight::class, 'airline_id', 'flight_id');
    }
}
