@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
			@endforeach

			@if(Session::has('message'))
			<div class="alert alert-success">
				{{Session::get('message')}}
			</div>
			@endif

			@if(Session::has('errmessage'))
			<div class="alert alert-danger">
				{{Session::get('errmessage')}}
			</div>
			@endif


			<form action="{{route('store.booking')}}" method="post">@csrf
				<div class="card">
					<div class="card-header lead">Booking Date: {{$date}}</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for=""><h3>Select Destination</h3></label>
									<select name="destination" id="destination" class="form-select" aria-label="Default select example">
										<option selected="" disabled>Select Destination</option>
										@foreach($destinations as $row)
										<option value="{{ $row->id }}">{{ $row->destination }}</option>
										@endforeach
									</select>
									@error('destination')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div><br>
						<div class="row">
							@foreach($seats as $seat)
							<div class="col-md-2" style="margin:4px;">
								<label class="btn btn-outline-primary">
									<input type="checkbox" name="seat_no[]" value="{{$seat->seat_no}}" >
									<span>Seat No-{{$seat->seat_no}}</span>
								</label>
							</div>
							<input type="hidden" name="tripId" value="{{$seat->trip_id}}">
							<input type="hidden" name="date" value="{{$date}}">

							@endforeach
						</div>
					</div>
				</div>
				<div class="card-footer">
					@if(Auth::check())
					<button type="submit" class="btn btn-success" style="width: 100%;">Book Ticket</button>
					@else 
					<p>Please login to make an appointment</p>
					<a href="/register">Register</a>
					<a href="/login">Login</a>
					@endif

				</div>
			</form>

		</div>
	</div>
</div>
@endsection
