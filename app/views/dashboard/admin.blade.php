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
<!-- <div class="container-fluid"> -->
<div class="col-md-9 col-sm-9 col-xs-offset-0">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2 class="header">Pending leave applications</h2>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Applicant</th>
							<th>Leave Applied</th>
							<th>From</th>
							<th>To</th>
							<th>No. of days</th>
							<th>Reason for leave</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pending_leave as $pending)
							{{ "<tr><td>".$pending->username."</td><td>".$pending->leave_type}} @if($pending->leave_type == "Earned Leave") {{ "(".$pending->total_earned_leave.")" }} @endif @if($pending->leave_type == "Half Pay Leave") {{ "(".$pending->total_half_pay_leave.")" }} @endif
							{{"</td><td>".$pending->leave_from."</td><td>".$pending->leave_to."</td><td>".$pending->no_of_days."</td><td>".$pending->reason."</td>"}}
						{{Form::open(['route'=>'leavetaken.reject','method'=>'POST','class'=>'form'])}}
							{{"<td><input type='text' name='reject_remark'></td><td><button type='submit' class='btn btn-fab btn-fab-mini btn-raised btn-sm btn-danger tiny-btn' value=".$pending->leave_id." name='leave_id'  data-toggle='tooltip' data-placement='left' title='Reject Application'><i class='glyphicon glyphicon-remove-circle'></i></button> <a href=".route('leavetaken.accept',[$pending->leave_id])." class='btn btn-fab btn-fab-mini btn-raised btn-sm btn-success tiny-btn'><i class='glyphicon glyphicon-ok-circle'></i></a></td></tr>" }}
						{{Form::close()}}
						@endforeach						
					</tbody>
				</table>
			</div>

		</div>
				{{$pending_leave->links();}}
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
				        <div class="input-group">
				            <label for="selectLeave" class="control-label">Leave Type</label>
				                <select class="form-control" id="selectLeave" name="selectLeave">
				                    @foreach($leavelist as $leave)
									{{ "<option value=".$leave->id.">".$leave->type."</option>"; }}
							   		@endforeach
				                </select>  
				        </div>
				        </div>

				        <div class="form-group">
				       	<div class="input-group">
				            <label for="selectApprover" class="control-label">Apply To</label>
				                <select class="form-control" id="selectApprover" name="selectApprover">
				                	@foreach($adminlist as $admin)
										{{ "<option value=".$admin->id.">".$admin->name."</option>";}}
							   		@endforeach
				                </select>        
				        </div>
				        </div>
				        
					    <div class="form-group">
					       <div class="input-group">
					       		<label for="inputDateFrom" class="control-label">From</label>
					       			<input type="text" class="form-control" id="datefrom" name="datefrom" size="10">
					       	</div>
					    </div>
					    
					    <div class="form-group">
					    	<div class="input-group">   	
					       		<label for="inputDateTo" class="control-label">To</label>
					       			<input type="text" class="form-control" id="dateto" name="dateto" size="12">
					       </div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label for="totaldays" class="control-label">Total days</label>
									<input type="text" class="form-control" id="totaldays" name="totaldays" size="6">
							</div>
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
@stop
