<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Trip;
use App\Models\SeatAllocation;



class TripController extends Controller
{

    public function index()
    {
        $trips = Trip::latest()->get();
        $routes = Route::all();
        return view('admin.trip.index',compact('trips','routes'));

    }


    public function create()
    {
        $routes = Route::all();
        return view('admin.trip.create',compact('routes'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            //'trip_date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'trip_date'=>'required',
            'seat_no'=>'required'
        ]);



        $trip = Trip::where('trip_date',$request->trip_date)->where('route_id',$request->route_id)->first();

     
        $route = Route::where('id',$request->route_id)->first();
        $routeName = $route->route_name;



        if($trip){
            return redirect()->back()->with('message','Bus Schedule Already Created For '. $request->trip_date. ' Date  & '.$routeName.' Route');
        }else{
            $trip = Trip::create([
            'trip_date' => $request->trip_date,
            'route_id'=> $request->route_id,
        ]);

        foreach($request->seat_no as $seat_no){
            SeatAllocation::create([
                'trip_id'=> $trip->id,
                'seat_no'=> $seat_no,
            ]);
        }
        return redirect()->back()->with('message','Bus Schedule created for '. $request->trip_date); 
        }


       
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $appoinment = Appointment::find($id);
        $appoinment->delete();

        $appoinment_time = Time::where('appointment_id',$id);
        $appoinment_time->delete();
        return redirect()->to('/appointment')->with('message','Appoinment time deleted');
    }

    public function check(Request $request){
        $routes = Route::all();
        $trip_date = $request->trip_date;
        $trip = Trip::where('trip_date',$trip_date)->where('route_id',$request->route_id)->first();
        $route = Route::where('id',$request->route_id)->first();
        $routeName = $route->route_name;
        if(!$trip){
            return redirect()->to('/schedule')->with('errmessage','Bus Schedule not available for this : '.$trip_date. ' Date  & '.$routeName.' Route');
        }
        $tripId = $trip->id;
        $seats = SeatAllocation::where('trip_id',$tripId)->get();
        return view('admin.trip.index',compact('seats','tripId','trip_date','routes','routeName'));
    }

    public function updateTrip(Request $request){
        $tripId = $request->tripId;
        $seat = SeatAllocation::where('trip_id',$tripId)->delete();
        //dd($appointment);
        foreach($request->seat_no as $seat_no){
            SeatAllocation::create([
                'trip_id'=>$tripId,
                'seat_no'=>$seat_no,
                'status'=>0
            ]);
        }
        return redirect()->route('trip.index')->with('message','Bus Schedule updated!!');
    }


 
}
