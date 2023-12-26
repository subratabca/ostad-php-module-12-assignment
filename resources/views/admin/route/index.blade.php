@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Route</h5>
                    <span>Route List</span>
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
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($routes)>0)
                        @foreach($routes as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->route_name}}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{route('route.edit',[$row->id])}}"><i class="ik ik-edit-2"></i></a>

                                    <form action="{{route('route.destroy',[$row->id])}}" method="post">@csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="ik ik-trash-2"></i></button>

                                    </form>

                                </div>
                            </td>
                            <td>x</td>
                        </tr>

                        @endforeach

                        @else 
                        <td>No Routes to display</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection