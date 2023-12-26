<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['trip_date','route_id'];

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function seats(){
        return $this->hasMany(SeatAllocation::class);
    }
}
