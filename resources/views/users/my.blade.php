@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($user))
				<h1>My Profile</h1>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<td>{{$user->name}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$user->email}}</td>
					</tr>
					
				</table>
			@else
				<p>Ops..! No Details to display..</p>	
			@endif
		</div>
	</div>
</div>

@endsection