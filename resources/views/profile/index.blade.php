@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Profile Links</h2>
			<div class="alarm-red"></div>
			@if(count($profiles) > 0)
				<ul id="sortable">
				@foreach($profiles as $profile)
						<li class="ui-state-default" id="{{$profile->url}}###{{$profile->id}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$profile->url}}</li>
				@endforeach
				</ul>
			@else
				<p>Ops..! No profile found for this business..</p>
			@endif
		
			<button class="sortable_submit">Sort</button>
			<p>Note: You can sort and save the links above, to sort just drag an item.</p>
		</div>
	</div>
</div>
<style>
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; }
	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>

@endsection