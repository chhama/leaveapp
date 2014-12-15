@extends('layout')
@section('extrajs')
<script language="javascript">
$(document).ready(function() {
    $('#datefrom').datetimepicker({
		timepicker:false,
		format:' Y/m/d',
		formatDate:'Y/m/d',
	});

    $('#dateto').datetimepicker({
	    timepicker:false,
		format:'Y/m/d',
		formatDate:'Y/m/d',
    });

    
});
</script>
@stop
<div class="col-md-12 col-xs-offset-0">
<!-- <div class="panel panel-info"> -->
	<div class="panel-body">
	   
	<div class="col-md-8">
		<div class="panel panel-default">
			
			<div class="panel-body">

				<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised mdi-action-assessment pull-right"></a>
				<h2 class='header'>Leave status</h2>
			   Basic panel example
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<!-- <a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised mdi-action-today pull-right"></a> -->

				<h2 class='header'>Apply leave</h2>

		{{Form::open(['url'=>'leave.store','class'=>'form-horizontal'])}}
			   <form class="form-horizontal">
    <fieldset>
        
        <div class="form-group">
            <label for="selectLeave" class="col-lg-2 control-label">Leave Type</label>
            <div class="col-lg-10">
                <select class="form-control" id="selectLeave">
                    <option>Earned Leave</option>
                    <option>Half Pay Leave</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                
            </div>
        </div>

         <div class="form-group">
            <label for="selectApprover" class="col-lg-2 control-label">Apply To</label>
            <div class="col-lg-10">
                <select class="form-control" id="selectApprover">
                    <option>CIO, DICT</option>
                    <option>DD(A), DICT</option>
                    <option>PM, MSEGS</option>
                    <option>CEO, MSEGS</option>
                    <option>5</option>
                </select>
                
            </div>
        </div>
        
	    <div class="form-group">
	       <div class="input-group">
	       		<label for="inputDateFrom" class="col-lg-2 control-label">From</label>
	       		<div class="col-lg-4">
	       			<input type="text" class="form-control" id="datefrom">
	       		</div>
	       		<label for="inputDateTo" class="col-lg-2 control-label">To</label>
	       		<div class="col-lg-4">
	       			<input type="text" class="form-control" id="dateto">
	       		</div>
	       </div>
		</div>

        <div class="form-group">
            <label for="reason" class="col-lg-2 control-label">Reason</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="reason"></textarea>
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
	{{Form::close()}}

			</div>
		</div>
	</div>
	</div>
<!-- </div> -->
</div>