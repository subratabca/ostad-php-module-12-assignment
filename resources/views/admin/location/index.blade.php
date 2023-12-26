@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Bus Location List</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Route Name</th>
                            <th>Destination</th>
                            <th>Fare</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($locations)>0)
                        @foreach($locations as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->route->route_name}}</td>
                            <td>{{$row->destination}}</td>
                            <td>{{$row->fare}}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{route('location.edit',[$row->id])}}"><i class="ik ik-edit-2"></i></a>

                                    <form action="{{route('location.destroy',[$row->id])}}" method="post">@csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="ik ik-trash-2"></i></button>

                                    </form>

                                </div>
                            </td>
                            <td>x</td>
                        </tr>

                        @endforeach

                        @else 
                        <td>No Locations to display</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection