<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;


class RouteController extends Controller
{

    public function index()
    {
        $routes = Route::get();
        return view('admin.route.index',compact('routes'));
    }


    public function create()
    {
        return view('admin.route.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'route_name'=>'required|unique:routes',
        ]);

        Route::create($request->all());
        return redirect()->back()->with('message','Route created');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $route = Route::find($id);
        return view('admin.route.edit',compact('route'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'route_name'=>'required'
        ]);
        $route = Route::find($id);
        $route->route_name = $request->route_name;
        $route->save();
        return redirect()->route('route.index')->with('message','Route updated');
    }


    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->route('route.index')->with('message','Route deleted');
    }
}
