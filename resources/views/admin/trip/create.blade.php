@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Setting Bus Schedule</h5>
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

    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach

    <form action="{{route('trip.store')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose Date & Bus Route
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
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Choose Seat No
                <span style="margin-left: 700px">Check/Uncheck
                    <input type="checkbox" onclick=" for(c in document.getElementsByName('seat_no[]')) document.getElementsByName('seat_no[]').item(c).checked=this.checked" >
                </span>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="seat_no[]"  value="1">1</td>
                            <td><input type="checkbox" name="seat_no[]"  value="2">2</td>
                            <td><input type="checkbox" name="seat_no[]"  value="3">3</td>
                            <td><input type="checkbox" name="seat_no[]"  value="4">4</td>
                            <td><input type="checkbox" name="seat_no[]"  value="5">5</td>
                            <td><input type="checkbox" name="seat_no[]"  value="6">6</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="seat_no[]"  value="7">7</td>
                            <td><input type="checkbox" name="seat_no[]"  value="8">8</td>
                            <td><input type="checkbox" name="seat_no[]"  value="9">9</td>
                            <td><input type="checkbox" name="seat_no[]"  value="10">10</td>
                            <td><input type="checkbox" name="seat_no[]"  value="11">11</td>
                            <td><input type="checkbox" name="seat_no[]"  value="12">12</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="seat_no[]"  value="13">13</td>
                            <td><input type="checkbox" name="seat_no[]"  value="14">14</td>
                            <td><input type="checkbox" name="seat_no[]"  value="15">15</td>
                            <td><input type="checkbox" name="seat_no[]"  value="16">16</td>
                            <td><input type="checkbox" name="seat_no[]"  value="17">17</td>
                            <td><input type="checkbox" name="seat_no[]"  value="18">18</td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="seat_no[]"  value="19">19</td>
                            <td><input type="checkbox" name="seat_no[]"  value="20">20</td>
                            <td><input type="checkbox" name="seat_no[]"  value="21">21</td>
                            <td><input type="checkbox" name="seat_no[]"  value="22">22</td>
                            <td><input type="checkbox" name="seat_no[]"  value="23">23</td>
                            <td><input type="checkbox" name="seat_no[]"  value="24">24</td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td><input type="checkbox" name="seat_no[]"  value="25">25</td>
                            <td><input type="checkbox" name="seat_no[]"  value="26">26</td>
                            <td><input type="checkbox" name="seat_no[]"  value="27">27</td>
                            <td><input type="checkbox" name="seat_no[]"  value="28">28</td>
                            <td><input type="checkbox" name="seat_no[]"  value="29">29</td>
                            <td><input type="checkbox" name="seat_no[]"  value="30">30</td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="seat_no[]"  value="31">31</td>
                            <td><input type="checkbox" name="seat_no[]"  value="32">32</td>
                            <td><input type="checkbox" name="seat_no[]"  value="33">33</td>
                            <td><input type="checkbox" name="seat_no[]"  value="34">34</td>
                            <td><input type="checkbox" name="seat_no[]"  value="35">35</td>
                            <td><input type="checkbox" name="seat_no[]"  value="36">36</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>

<style type="text/css">
input[type="checkbox"]{
    zoom:1.1;

}
body{
    font-size: 18px;
}
</style>



@endsection