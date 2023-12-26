@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Create New Location</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{route('location.store')}}" method="post" >@csrf
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Destination name</label>
                                <input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" placeholder="Enter destination" value="{{old('destination')}}">
                                @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Bus Fare</label>
                                <input type="number" name="fare" class="form-control @error('fare') is-invalid @enderror" placeholder="Enter Fare" value="{{old('fare')}}">
                                @error('fare')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Select Bus Route</label>
                                <select name="route_id" id="route_id" class="form-control" aria-label="Default select example">
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
                            <div class="form-group" style="margin-left:20px;">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection