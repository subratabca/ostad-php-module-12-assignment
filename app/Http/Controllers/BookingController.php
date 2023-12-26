<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Trip;
use App\Models\SeatAllocation;
use App\Models\Location;
use App\Models\Booking;

class BookingController extends Controller
{


    public function search()
    {

        date_default_timezone_set('Asia/Dhaka');
        if(request('date')){
            $date = request('date');
            $bustrips = $this->findTripsBasedOnDate(request('date'));
            return view('home',compact('bustrips','date'));
        }

        $date = date('Y-m-d');
        $bustrips = Trip::where('trip_date',date('Y-m-d'))->get();
        return view('home',compact('bustrips','date'));
    }

    public function findTripsBasedOnDate($date)
    {
        $bustrips = Trip::where('trip_date',$date)->get();
        return $bustrips;
    }



    public function show($tripId,$date)
    {
        $trip = Trip::where('id',$tripId)->where('trip_date',$date)->first();
        $seats = SeatAllocation::where('trip_id',$trip->id)->where('status',0)->get();
        $destinations = Location::where('route_id',$trip->route_id)->get();
        return view('booking',compact('seats','date','destinations'));
    }


    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        $request->validate([
            'seat_no'=>'required',
            'destination'=>'required',
        ]);

        $seats = $request->seat_no;
        $date = $request->date;
        $userId = auth()->user()->id;
        $tripId = $request->tripId;

        $tripData = Trip::where('id',$tripId)->first();
        $routeId = $tripData->route_id;
        $locationData = Location::where('route_id',$routeId)->first();

        $checkBooking = Booking::orderby('id','desc')->where('user_id',$userId)->where('trip_id',$tripId)->where('journey_date',$date)->exists();

        if($checkBooking){
            return redirect()->back()->with('message','You have already booked.');
        }else{
            $booking = Booking::create([
                'user_id'=> $userId,
                'trip_id'=> $tripId,
                'destination'=> $locationData->destination,
                'fare'=> $locationData->fare,
                'journey_date'=> $date,
            ]);

            foreach($seats as $seat){
                SeatAllocation::where('trip_id',$tripId)
                    ->where('seat_no',$seat)
                    ->update(['status'=>1]);

            }

            return redirect()->route('my.booking')->with('message','Your booking was confirmed'); 
        }

    }



    public function myBookings()
    {
        $bookings = Booking::latest()->where('user_id',auth()->user()->id)->get();
        $datas = SeatAllocation::where('status',1)->get();
        //dd($seats);

        //dd($datas);
        return view('my-booking',compact('bookings','datas'));
    }

    public function removeBooking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->back()->with('message','Booking deleted');
    }


}
