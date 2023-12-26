@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Update Location</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{route('location.update',[$location->id])}}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Destination name</label>
                                <input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" value="{{$location->destination}}">
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
                                <input type="text" name="fare" class="form-control @error('fare') is-invalid @enderror" value="{{$location->fare}}">
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
                                    <option value="{{ $route->id }}" {{ $route->id == $location->route_id ? 'selected' : '' }} >
                                        {{ $route->route_name }}</option>
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection