<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = ['route_id','destination','fare'];

    public function route(){
        return $this->belongsTo(Route::class);
    }
}
