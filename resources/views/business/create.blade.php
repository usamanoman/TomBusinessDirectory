@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Add Business</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/business/create') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ old('address') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="state">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">ZIP</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="zip">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Phone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phone">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Website URL</label>
							<div class="col-md-6">
								<input type="url" class="form-control" name="website">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Business User</label>
							<div class="col-md-6">
								<select class="form-control" name="user_id" id="user_id">
									@foreach($users as $user)
										<option value="{{$user->id}}">{{$user->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
