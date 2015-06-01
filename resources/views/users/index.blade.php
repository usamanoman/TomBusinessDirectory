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
							<th>Delete</th>
							<th>Edit</th>
							
						</tr>
					</thead>
					<tbody>
				@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ base64_decode($user->password) }}</td>
							<form action="user/remove/{{$user->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<td> <input type="submit" value="Delete" name="submit"></td>
							</form>
							<td><a href="{{ url('/user/edit/'.$user->id) }}">Edit User</a></td>
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