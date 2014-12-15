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
<div class="col-md-3">&nbsp;</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>USER PROFILE</strong></div>
		<div class="panel-body">
        {{ Form::model($userById,array('url'=>route('user.updateprofile',$userById->id),'method'=>'put','class'=>'form-vertical')) }}
            <div class="form-group">
            	{{ Form::label('Employee ID') }}
                {{ Form::text('employee_id',null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Name') }}
                {{ Form::text('name',null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Username') }}
                {{ Form::text('username',null,array('class'=>'form-control input-sm','required','readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Password')}}
                {{ Form::password('password',array('class'=>'form-control input-sm')) }}
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
                {{ Form::select('group',array(''=>'',   'Male' =>'Male',
                                                        'Female' =>'Female',
                                                        'Other' =>'Other'),
                                    null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Date of Birth')}}
                {{ Form::text('date_of_birth',null,array('class'=>'form-control input-sm','id'=>'datetimepicker1','readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Group') }}
                {{ Form::select('group',array(''=>'',   'A' =>'A',
                                                        'B' =>'B',
                                                        'C' =>'C',
                                                        'D' =>'D'),
                                    null,array('class'=>'form-control input-sm','required','readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Entry into Service')}}
                {{ Form::text('entry_into_service',null,array('class'=>'form-control input-sm','id'=>'datetimepicker2' ,'readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Superannuation Date')}}
                {{ Form::text('superannuation_date',null,array('class'=>'form-control input-sm','id'=>'datetimepicker3' ,'readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Total Earned Leave')}}
                {{ Form::text('total_earned_leave',null,array('class'=>'form-control input-sm','readonly')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Total Half Pay Leave')}}
                {{ Form::text('total_half_pay_leave',null,array('class'=>'form-control input-sm','readonly')) }}
            </div>
            <div class="form-group">
            	   {{ Form::submit('Update',array('class'=>'btn btn-success btn-sm')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<div class="col-md-3">&nbsp;</div>

@stop