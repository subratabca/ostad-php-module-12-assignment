@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Route</h5>
                    <span>Add New Route</span>
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
                <form class="forms-sample" action="{{route('route.store')}}" method="post" >@csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Route name</label>
                                <input type="text" name="route_name" class="form-control @error('route_name') is-invalid @enderror" placeholder="Enter Route name" value="{{old('route_name')}}">
                                @error('route_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection