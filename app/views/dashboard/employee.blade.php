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
@section('container')
<div class="container-fluid">
	   
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised mdi-action-assessment pull-right"></a>
				<h2 class='header'>Leave status</h2> 
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
				<div class="panel-body">
					<!-- <a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised mdi-action-today pull-right"></a> -->
					<h2 class='header'>Apply leave</h2>

					{{Form::open(['route'=>'leavetaken.store','class'=>'form','role'=>'form'])}}
				    <fieldset>    
				        <div class="form-group">
				        <!-- <div class="input-group"> -->
				            <label for="selectLeave" class="control-label">Leave Type</label>
				                <select class="form-control select" id="selectLeave" name="selectLeave" width='100%'>
				                    @foreach($leavelist as $leave)
									{{ "<option value=".$leave->id.">".$leave->type."</option>"; }}
							   		@endforeach
				                </select>  
				        <!-- </div> -->
				        </div>

				        <div class="form-group">
				       	<!-- <div class="input-group"> -->
				            <label for="selectApprover" class="control-label">Apply To</label>
				                <select class="form-control" id="selectApprover" name="selectApprover">
				                	@foreach($adminlist as $admin)
										{{ "<option value=".$admin->id.">".$admin->name."</option>";}}
							   		@endforeach
				                </select>        
				        <!-- </div> -->
				        </div>
				        
					    <div class="form-group">
					       <!-- <div class="input-group"> -->
					       		<label for="inputDateFrom" class="control-label">From</label>
					       			<input type="text" class="form-control input-sm" id="datefrom" name="datefrom" size="10">
					       	<!-- </div> -->
					    </div>
					    
					    <div class="form-group">
					    	<!-- <div class="input-group">   	 -->
					       		<label for="inputDateTo" class="control-label">To</label>
					       			<input type="text" class="form-control" id="dateto" name="dateto" size="12">
					       <!-- </div> -->
						</div>

						<div class="form-group">
							<!-- <div class="input-group"> -->
								<label for="totaldays" class="control-label">Total days</label>
									<input type="text" class="form-control" id="totaldays" name="totaldays" size="6">
							<!-- </div> -->
						</div>

				        <div class="form-group">
				            <label for="reason" class="control-label">Reason</label>
				                <textarea class="form-control" rows="3" id="reason" name="reason"></textarea>
				        </div>
				       
				        <div class="form-group">
				            <div class="col-lg-12 col-lg-offset-0">
				                <button class="btn btn-warning">Cancel</button>
				                <button type="submit" class="btn btn-primary">Submit</button>
				            </div>
				        </div>
				    </fieldset>
					{{Form::close()}}

				</div>
		</div>
	<!-- </div> -->
	</div>
<!-- </div> -->
</div>
@stop