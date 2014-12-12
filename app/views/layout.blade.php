<!doctype html>
<html>
<head  profile="http://www.w3.org/2005/10/profile">
        <link rel="icon" 
        type="image/png" 
        href="http://cdn.freefavicon.com/freefavicons/objects/boite-a-coche-checkbox-152-188866.png">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>Leave Application</title>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
{{ HTML::Script('js/jquery-1.11.1.min.js') }}
{{ HTML::Script('js/bootstrap.js') }}
{{ HTML::Script('js/bootstrap-datetimepicker.js') }}
{{ HTML::Style('css/bootstrap.css') }}
{{ HTML::Style('css/jquery.datetimepicker.css') }}

@yield('extrajs')
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header col-md-3" style="background:#CCC;">
    	<a class="navbar-brand" href="{{ URL::to('/')}}">Online Leave Application</a>
  	</div>
    <div class="col-md-7">
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
<div class="container" style="margin-top:70px; margin-bottom:30px;">
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