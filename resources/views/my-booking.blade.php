@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header lead">My Booking List</div>
				<div class="card-body">
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
												<th>Journey Date</th>
												<th>Passenger Name</th>
												<th>Route Name</th>
												<th>Fare</th>
												<th>Seat No</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											@if(count($bookings)>0 && count($datas)>0)
											@foreach($datas as $data)
											  @foreach($bookings as $key=> $row)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$row->journey_date}}</td>
												<td>{{$row->user->name}}</td>
												<td>{{$row->destination}}</td>
												<td>{{$row->fare}}</td>
												@if($data->trip_id == $row->trip_id)
												<td>
													{{$data->seat_no}}
												</td>
												@endif
												<td>
													<a href="{{ URL::to('remove-booking/'.$row->id) }}" class="btn btn-danger" title="delete" id="delete">Delete</a>
												</td>
											</tr>
											@endforeach
											@endforeach

											@else 
											<td>No Booking to display</td>
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
