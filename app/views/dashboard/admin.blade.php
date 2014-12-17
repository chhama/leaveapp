@extends('layout')

@section('container')
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-lg-12">
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
</div>
</div>
@stop
