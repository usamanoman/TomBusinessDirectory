@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(count($users) > 0)
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>
				@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ base64_decode($user->password) }}</td>
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