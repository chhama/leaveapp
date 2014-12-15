<!doctype html>
<html>
<head  profile="http://www.w3.org/2005/10/profile">
        <link rel="icon" 
        type="image/png" 
        href="http://www.freefavicon.com/freefavicons/objects/clock-without-frame-152-190979.png">

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
{{ HTML::Script('js/ripples.min.js') }}
{{ HTML::Script('js/material.min.js') }}
{{ HTML::Script('js/npm.js') }}

{{ HTML::Style('css/material.css') }}
{{ HTML::Style('css/bootstrap.css') }}
{{ HTML::Style('css/jquery.datetimepicker.css') }}
{{ HTML::Style('css/ripples.min.css') }}
{{ HTML::Style('css/material-wfont.min.css') }}
{{ HTML::Style('css/custom.css') }}

@yield('extrajs')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top shadow-z-3 navbar-static-top" role="navigation" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ URL::to('/')}}">Online Leave Application</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ URL::route('leave.index')}}">Leave Type</a></li>
      <li><a href="{{ URL::route('leavetaken.index')}}">Manage Leave</a></li>
      <li><a href="{{ URL::route('user.index')}}">Manage User</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">

        <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown"><i class="btn btn-danger btn-fab btn-raised mdi-action-perm-identity status-btn"><b class="caret"></b> </i></a>
        <ul class="dropdown-menu">
          <li class='strong'><a class='h4 text-center'>{{ Auth::user()->name }}</a></li>
          <!-- <li role="presentation" class="divider"></li> -->
          <li><a class='btn btn-default' href="{{ URL::route('user.show',Auth::user()->id) }}">Profile <i class=" mdi-action-account-circle"></i></a></li>
          <li><a class='btn btn-default' href="{{ URL::to('logout')}}">Logout <i class="alert-danger mdi-action-exit-to-app"></i> </a></li>
     
        </ul>
      </li>
      <li><a href="#">&nbsp;</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>


<div class="container" style="margin-top:70px; margin-bottom:30px;">
  @if(Session::has('flash_message'))
      <p class="alert alert-success"><strong>{{ Session::get('flash_message') }}</strong></p>
  @endif
	@yield('container')
</div>
<footer class=" navbar navbar-inverse navbar-fixed-bottom text-center dzFooter" >
     <i class="glyphicon glyphicon-cloud-download"></i><br>Copyright &copy;  MSeGS <?=date('Y')?> 
</footer>
</body>
</html>