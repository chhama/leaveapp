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


{{ HTML::Script('js/jquery-1.11.1.min.js') }}
{{ HTML::Style('css/bootstrap.css') }}
{{ HTML::Style('css/custom.css') }}
<script language="javascript">
            $(function(){
                $('#login_uname').focus();
            })

        </script>
<style>
    body{
        margin-top: 200px;
    }
</style>
@yield('extrajs')
</head>
<body>
    
<div class="col-md-4">&nbsp;</div>
<div class="col-md-4">
    @if(Session::has('flash_message'))
      <p class="alert alert-success"><strong>{{ Session::get('flash_message') }}</strong></p>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading"><strong>FORGOT PASSWORD</strong></div>
        <div class="panel-body">
        {{Form::open(['route'=>'submitforgot','class'=>'form-horizontal'])}}
            <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    {{ Form::label('Username') }}
                    {{ Form::text('username','',array('class'=>'form-control input-sm','required','id'=>'login_uname')) }}
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    {{ Form::label('Registered Mobile No.')}}
                     {{ Form::text('mobile','',array('class'=>'form-control input-sm','required')) }}
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                   {{ Form::submit('Reset Password',array('class'=>'btn btn-success btn-block')) }}
                </div>
                <div class="col-sm-1"></div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<div class="col-md-4">&nbsp;</div>
</body>