<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Route;
use App\Models\Trip;
use App\Models\SeatAllocation;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->role->name=="admin"){
            return redirect('/dashboard');
        }

        $date = date('Y-m-d');
        $bustrips = Trip::where('trip_date',date('Y-m-d'))->get();
        return view('home',compact('bustrips','date'));
    }
}
