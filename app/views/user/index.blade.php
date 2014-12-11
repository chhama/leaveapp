@extends('layout')

@section('container')
<div class="col-md-8">
<form method="get">
<input type="hidden" name="dz" value="apparatus" />
<div class="panel panel-default">
<div class="panel-heading">
	<div class="col-md-3">
		<h5><strong>MANAGE USER</strong></h5>
	</div>
	<div class="col-md-3">
		<input type='text' name='dzApparatusName' placeholder="Search By Name" class="form-control" value='<?php if(isset($_GET['dzGo'])){ echo $_GET['dzApparatusName'];} ?>'>
	</div>
    <input type="submit" name="dzGo" value="GO" class="btn btn-info btn-sm"/>
    <span class="pull-right">
        <input type="submit" name="labs" value="Active" class="btn btn-info btn-sm"  />
        <input type="submit" name="labs" value="InActive" class="btn btn-info btn-sm" />
        <input type="submit" name="labs" value="Delete" class="btn btn-info btn-sm" />
    </span>
</div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="47" height="38" align="left">&nbsp;</th>
    <th width="244" height="38" align="left">Display Name</th>
    <th width="244" height="38" align="left">Username</th>
    <th width="294" height="38" align="left">Email</th>
    <th width="294" height="38" align="left">Role</th>
    <th width="121" align="left">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
  	@foreach($userAll as $user)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno}}</td>
    <td height="25" align="left"><input type="checkbox" name="dzApparatusId[]" /></td>
    <td height="25" align="left">{{ $user->userDisplayName }}&nbsp;</td>
    <td height="25" align="left">{{ $user->username }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $user->userEmail }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $user->userType }}&nbsp;</td>
    <td align="left" class="action text-center">
    	<a href='{{ URL::to("user/edit/$user->id") }}' class="tooltip-top" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
    	<a href="#" onClick="if(confirm('Are You Sure You Want To Delete?')) { document.location='{{ URL::to("user/destroy/$user->id") }}'; }" class="tooltip-top" title="Delete" ><i class="glyphicon glyphicon-trash"></i></a>
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $userAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</form>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>NEW USER</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>'user/store','class'=>'form-horizontal','files'=>true)) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Display Name') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('userDisplayName','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Username') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('username',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Password')}}</div>
                <div class="col-sm-8">
                    {{ Form::password('password',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Email')}}</div>
                <div class="col-sm-8">
                    {{ Form::email('userEmail',null,array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Role') }}</div>
                <div class="col-sm-8">{{ Form::select('userType',array(''=>'','Administrator'=>'Administrator',
                                                                       'Editor'=>'Editor',
                                                                       'Subscriber'=>'Subscriber'),
                                                        null,array('class'=>'form-control input-sm','required')) }}</div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-8">
            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
@stop