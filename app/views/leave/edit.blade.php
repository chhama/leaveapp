@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
	<h5><strong>MANAGE LEAVE</strong></h5>	
</div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" class="text-center">#</th>
    <th width="400" height="38" align="left">Type</th>
    <th width="100" height="38" align="left">Max Allowed</th>
    <th width="100" class="text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($leaveAll as $leave)
  	<tr bgcolor="">
    <td height="25" class="text-center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $leave->type }}&nbsp;</td>
    <td height="25" class="text-center">{{ $leave->max_allowed }}&nbsp;</td>
    {{Form::open(array('url'=>route('leave.destroy', array($leave->id)),'method'=>'delete'))}} 
    <td align="left" class="action text-center">
        <a href="{{route('leave.edit', array($leave->id))}}" title="Edit leave" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-primary"  style="width:30px; height:30px; padding:11px 5px 10px 6px;"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
    
        <button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id"  title="Remove Leave" value="{{$leave->id}}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-danger" style="width:30px; height:30px; padding:11px 4px 10px 4px;"><i class="glyphicon glyphicon-trash"></i></button>
    </td>
    {{Form::close()}}
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $leaveAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</form>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>EDIT LEAVE</strong></div>
		<div class="panel-body">
        {{ Form::model($leaveById,array('url'=>route('leave.update',$leaveById->id),'method'=>'put','class'=>'form-verticle')) }}
            <div class="form-group">
            	{{ Form::label('Type') }}
                {{ Form::text('type',null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('Max Allowed') }}
                {{ Form::text('max_allowed',null,array('class'=>'form-control input-sm','required')) }}
            </div>
            <div class="form-group">
            	   {{ Form::submit('Update',array('class'=>'btn btn-success btn-sm')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>


@stop