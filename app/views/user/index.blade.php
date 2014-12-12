@extends('layout')

@section('extrajs')
<script language="javascript">
$(document).ready(function() {
    $('#datetimepicker1').datetimepicker({
        step: 5
    });

    $('#datetimepicker2').datetimepicker({
        step: 5
    });

    $('#datetimepicker3').datetimepicker({
        step: 5
    });
});
</script>
@stop

@section('container')
<div class="col-md-8">
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
    <th width="85" height="38" align="center">#</th>
    <th width="244" height="38" align="left">Name</th>
    <th width="244" height="38" align="left">Username</th>
    <th width="294" height="38" align="left">Email</th>
    <th width="294" height="38" align="left">Type</th>
    <th width="121" align="left">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
  	@foreach($userAll as $user)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno}}</td>
    <td height="25" align="left">{{ $user->name }}&nbsp;</td>
    <td height="25" align="left">{{ $user->username }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $user->email }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $user->user_type }}&nbsp;</td>
    <td align="left" class="action text-center">
    	<a href='{{ URL::route("user.edit",$user->id) }}' class="tooltip-top" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
    	<a href="#" onClick="if(confirm('Are You Sure You Want To Delete?')) { document.location='{{ URL::route("user.destroy",$user->id) }}'; }" class="tooltip-top" title="Delete" ><i class="glyphicon glyphicon-trash"></i></a>
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
        {{ Form::open(['route'=>'user.store','class'=>'form-verticle'])}}
            <div class="form-group">
            	{{ Form::label('Employee ID') }}
                {{ Form::text('employee_id','',array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Name') }}
                {{ Form::text('name','',array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Username') }}
                {{ Form::text('username',null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Password')}}
                {{ Form::password('password',array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Mobile')}}
                {{ Form::text('mobile',null,array('class'=>'form-control input-sm')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Email')}}
                {{ Form::email('email',null,array('class'=>'form-control input-sm')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Sex') }}
                {{ Form::select('sex',array(''=>'','Male'=>'Male',
                                                   'Female'=>'Female',
                                                   'Other' => 'Other'),
                                    null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Date of Birth')}}
                {{ Form::text('date_of_birth',null,array('class'=>'form-control input-sm','id'=>'datetimepicker1')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Group') }}
                {{ Form::select('group',array(''=>'','A'=>'A',
                                                   'B'=>'B',
                                                   'C'=>'C',
                                                   'D'=>'D'),
                                    null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Entry into Service')}}
                {{ Form::text('entry_into_service',null,array('class'=>'form-control input-sm','id'=>'datetimepicker2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Superannuation Date')}}
                {{ Form::text('superannuation_date',null,array('class'=>'form-control input-sm','id'=>'datetimepicker3')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Total Earned Leave')}}
                {{ Form::text('total_earned_leave',null,array('class'=>'form-control input-sm')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Total Half Pay Leave')}}
                {{ Form::text('total_half_pay_leave',null,array('class'=>'form-control input-sm')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Type') }}
                {{ Form::select('user_type',array(''=>'','Administrator'=>'Administrator',
                                                         'Employee'=>'Employee'),
                                             null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>


@stop