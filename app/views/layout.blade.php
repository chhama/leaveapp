<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Leave App</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{ HTML::Style('css/bootstrap.min.css') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Style('css/dzStyle.css') }}
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header" style="background:#CCC;">
    	<a class="navbar-brand" href="{{ URL::to('/home')}}">Leave App</a>
  	</div>
    <div class="col-md-8">
    	<div class="collapse navbar-collapse">
    		<ul class="nav navbar-nav">
          <li><a href="{{ URL::route('leave.index')}}">Leave</a></li>
          <li><a href="{{ URL::route('leavetaken.index')}}">Register Leave</a></li>
    		</ul>
    	</div>
    </div>
    <div class="col-md-2">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="{{ URL::route('user.index')}}">User</a></li>
          <li><a href="{{ URL::to('logout')}}">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
<div class="container" style="margin-top:70px">
  @if(Session::has('flash_message'))
      <p class="alert alert-success"><strong>{{ Session::get('flash_message') }}</strong></p>
  @endif
	@yield('container')
</div>
<footer class="dzFooter nav navbar-default text-center" style="position:fixed; bottom:0px; width:100%; height:50px; padding-top:15px; color:#000 ">
     &copy;  <?=date('Y')?> 
</footer>
</body>
</html>