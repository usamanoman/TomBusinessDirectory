<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">User Profiler</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					@if (!Auth::guest())
						@if(Auth::user()->status == 0)
						<li><a href="{{ url('/user/create') }}">Add User</a></li>
						<li><a href="{{ url('/user/') }}">Show Users</a></li>
						<li><a href="{{ url('/business/create') }}">Add Business</a></li>
						<li><a href="{{ url('/business/') }}">Show Businesses</a></li>
						<li><a href="{{ url('/profiles/create') }}">Add Profile</a></li>
						@endif
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li><a href="{{ url('/user/my') }}">My Profile</a></li>
						<li><a href="{{ url('/user/business') }}">My Business</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#sortable" ).sortable();
			$( "#sortable" ).disableSelection();
			$(".sortable_submit").click(function(){
				var jsonObj=[];
				var sortedIDs = $( "#sortable" ).sortable( "toArray" );
				var jStr='[';
				for(var i=0 ; i< sortedIDs.length;i++){
					    jStr+='{"id":'+ sortedIDs[i].split("###")[1]+","+'"value":'+ (i+1) +'},'
				    
				}
				jStr = (jStr).slice(0,jStr.length-1);

				jStr+="]";
				console.log(jStr);
				$.ajax({
				  type: "GET",
				  url: '{{ url("/profiles/save") }}',
				  data:"data="+jStr,
				  success: function(response){
				  	if(response=="success"){
				  		window.location.href='{{ url("/") }}';
				  	}else{
				  		$("#alarm-red").append("<p>Ops.! Some error occured, try again.</p>")
				  	}
				  },
				});
			});
		});
	</script>

</body>
</html>
