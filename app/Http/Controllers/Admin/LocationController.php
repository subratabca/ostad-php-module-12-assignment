<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Route;


class LocationController extends Controller
{

    public function index()
    {
        $locations = Location::get();
        return view('admin.location.index',compact('locations'));
    }


    public function create()
    {
        $routes = Route::all();
        return view('admin.location.create',compact('routes'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'destination'=>'required|unique:locations',
            'fare'=>'required',
            'route_id'=>'required',
        ]);

        Location::create($request->all());
        return redirect()->back()->with('message','Bus Fare Inserted.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $location = Location::find($id);
        $routes = Route::all();
        return view('admin.location.edit',compact('location','routes'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'destination'=>'required',
            'fare'=>'required',
            'route_id'=>'required',
        ]);

        $location = Location::find($id);
        $location->destination = $request->destination;
        $location->fare = $request->fare;
        $location->route_id = $request->route_id;
        $location->save();
        return redirect()->route('location.index')->with('message','Bus Fare Updated.');
    }


    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect()->route('location.index')->with('message','Bus Fare deleted');
    }
}
