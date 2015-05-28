@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($business))
				<h1>My Business Profile</h1>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<td>{{$business->name}}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{$business->address}}</td>
					</tr>

					<tr>
						<th>City</th>
						<td>{{$business->city}}</td>
					</tr>
					<tr>
						<th>State</th>
						<td>{{$business->state}}</td>
					</tr>
					
					<tr>
						<th>Zip</th>
						<td>{{$business->zip}}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{{$business->phone}}</td>
					</tr>
					
				</table>
			@else
				<p>Ops..! No Details to display..</p>	
			@endif
		</div>
	</div>
</div>

@endsection