@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(count($businesses) > 0)
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>City</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Show Profile</th>
							
						</tr>
					</thead>
					<tbody>
				@foreach($businesses as $business)
						<tr>
							<td>{{ $business->name }}</td>
							<td>{{ $business->city }}</td>
							<td>{{ $business->address }}</td>
							<td>{{ $business->phone }}</td>
							<td><a href="{{ url('/profiles/show/'.$business->id) }}">Show Profiles</a></td>
						</tr>
				@endforeach
					</tbody>
				</table>
			@else
				<p>Ops..! No Business Found..</p>
			@endif
		</div>
	</div>
</div>

@endsection