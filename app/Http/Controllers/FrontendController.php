<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Trip;
use App\Models\SeatAllocation;


class FrontendController extends Controller
{

    public function index()
    {

        $date = date('Y-m-d');
        $bustrips = Trip::where('trip_date',date('Y-m-d'))->get();
        return view('welcome',compact('bustrips','date'));
    }


    public function findTripsBasedOnDate($date)
    {
        $bustrips = Trip::where('trip_date',$date)->get();
        return $bustrips;
    }



}
