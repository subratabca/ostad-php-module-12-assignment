<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = ['route_name'];

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function trip(){
        return $this->hasMany(Trip::class);
    }
}
