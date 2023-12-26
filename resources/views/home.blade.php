@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="/banner/bus_ticket.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>



<div class="col-md-7">
<form action="{{url('/search')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Find Bus Schedule By Date</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="date" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Find Bus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
    </div>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="card-header"> Bus Schedule </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Route Name</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($bustrips as $trip)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$trip->trip_date}}</td>
                            <td>{{$trip->route->route_name}}</td>
                            <td>
                                <a href="{{route('create.booking',[$trip->id,$trip->trip_date])}}"><button class="btn btn-success">Book Ticket</button></a>
                            </td>

                        </tr>
                        @empty
                        <td>No Bus Schedule Available For {{ $date }} Date</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

