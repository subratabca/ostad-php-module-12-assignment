@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Update Bus Schedule</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
    <div class="alert bg-success alert-success text-white" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    @if(Session::has('errmessage'))
    <div class="alert bg-danger alert-success text-white" role="alert">
        {{Session::get('errmessage')}}
    </div>
    @endif
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach

    <form action="{{route('trip.check')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose date
                <br>
                @if(isset($date))
                Your timetable for: 
                {{$date}}
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="trip_date" placeholder="Enter Date">
                    </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Select Bus Route</label>
                                <select name="route_id" id="route_id" class="form-select" aria-label="Default select example">
                                    <option selected="" disabled>Select Bus Route</option>
                                    @foreach($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->route_name }}</option>
                                    @endforeach
                                </select>
                                @error('route_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">check</button>
            </div>
        </div>
    </form>

    @if(Route::is('trip.check'))
    <form action="{{route('trip.update')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                 Update Seat No for {{ $routeName }} Route
                <span style="margin-left: 500px">Check/Uncheck
                    <input type="checkbox" onclick=" for(c in document.getElementsByName('seat_no[]')) document.getElementsByName('seat_no[]').item(c).checked=this.checked" >
                </span>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <input type="hidden" name="tripId" value="{{$tripId}}">
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="seat_no[]"  value="1" @if(isset($seats)){{$seats->contains('seat_no','1')?'checked':''}}@endif>1
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="2" @if(isset($seats)){{$seats->contains('seat_no','2')?'checked':''}}@endif>2
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="3" @if(isset($seats)){{$seats->contains('seat_no','3')?'checked':''}}@endif>3
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="4" @if(isset($seats)){{$seats->contains('seat_no','4')?'checked':''}}@endif>4
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="5" @if(isset($seats)){{$seats->contains('seat_no','5')?'checked':''}}@endif>5
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="6" @if(isset($seats)){{$seats->contains('seat_no','6')?'checked':''}}@endif>6
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="seat_no[]"  value="7" @if(isset($seats)){{$seats->contains('seat_no','7')?'checked':''}}@endif>7
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="8" @if(isset($seats)){{$seats->contains('seat_no','8')?'checked':''}}@endif>8
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="9" @if(isset($seats)){{$seats->contains('seat_no','9')?'checked':''}}@endif>9
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="10" @if(isset($seats)){{$seats->contains('seat_no','10')?'checked':''}}@endif>10
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="11" @if(isset($seats)){{$seats->contains('seat_no','11')?'checked':''}}@endif>11
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="12" @if(isset($seats)){{$seats->contains('seat_no','12')?'checked':''}}@endif>12
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="seat_no[]"  value="13" @if(isset($seats)){{$seats->contains('seat_no','13')?'checked':''}}@endif>13
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="14" @if(isset($seats)){{$seats->contains('seat_no','14')?'checked':''}}@endif>14
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="15" @if(isset($seats)){{$seats->contains('seat_no','15')?'checked':''}}@endif>15
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="16" @if(isset($seats)){{$seats->contains('seat_no','16')?'checked':''}}@endif>16
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="17" @if(isset($seats)){{$seats->contains('seat_no','17')?'checked':''}}@endif>17
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="18" @if(isset($seats)){{$seats->contains('seat_no','18')?'checked':''}}@endif>18
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="seat_no[]"  value="19" @if(isset($seats)){{$seats->contains('seat_no','19')?'checked':''}}@endif>19
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="20" @if(isset($seats)){{$seats->contains('seat_no','20')?'checked':''}}@endif>20
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="21" @if(isset($seats)){{$seats->contains('seat_no','21')?'checked':''}}@endif>21
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="22" @if(isset($seats)){{$seats->contains('seat_no','22')?'checked':''}}@endif>22
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="23" @if(isset($seats)){{$seats->contains('seat_no','23')?'checked':''}}@endif>23
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="24" @if(isset($seats)){{$seats->contains('seat_no','24')?'checked':''}}@endif>24
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                              <td><input type="checkbox" name="seat_no[]"  value="25" @if(isset($seats)){{$seats->contains('seat_no','25')?'checked':''}}@endif>25
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="26" @if(isset($seats)){{$seats->contains('seat_no','26')?'checked':''}}@endif>26
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="27" @if(isset($seats)){{$seats->contains('seat_no','27')?'checked':''}}@endif>27
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="28" @if(isset($seats)){{$seats->contains('seat_no','28')?'checked':''}}@endif>28
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="29" @if(isset($seats)){{$seats->contains('seat_no','29')?'checked':''}}@endif>29
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="30" @if(isset($seats)){{$seats->contains('seat_no','30')?'checked':''}}@endif>30
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="seat_no[]"  value="31" @if(isset($seats)){{$seats->contains('seat_no','31')?'checked':''}}@endif>31
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="32" @if(isset($seats)){{$seats->contains('seat_no','32')?'checked':''}}@endif>32
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="33" @if(isset($seats)){{$seats->contains('seat_no','33')?'checked':''}}@endif>33
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="34" @if(isset($seats)){{$seats->contains('seat_no','34')?'checked':''}}@endif>34
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="35" @if(isset($seats)){{$seats->contains('seat_no','35')?'checked':''}}@endif>35
                            </td>
                            <td><input type="checkbox" name="seat_no[]"  value="36" @if(isset($seats)){{$seats->contains('seat_no','36')?'checked':''}}@endif>36
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </div>
</form>

@else 
<h3>Bus schedule list: {{$trips->count()}}</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Route Name</th>
            <th scope="col">View/Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($trips as $key =>$trip)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$trip->trip_date}}</td>
            <td>{{$trip->route->route_name}}</td>
            <td>
                <form action="{{route('trip.check')}}" method="post">@csrf
                    <input type="hidden" name="trip_date" value="{{$trip->trip_date}}">
                    <input type="hidden" name="route_id" value="{{$trip->route_id}}">
                    <button type="submit" class="btn btn-primary">View/Update</button>
                </form>
            </td>
            <td>
                <form action="{{route('trip.destroy',[$trip->id])}}" method="post">@csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="ik ik-trash-2"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif


<style type="text/css">
input[type="checkbox"]{
    zoom:1.1;

}
body{
    font-size: 17px;
}
</style>



@endsection