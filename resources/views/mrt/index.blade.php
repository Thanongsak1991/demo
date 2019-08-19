@extends('layout.mrt-layout')
@section('title','MRT Record')
@section('content')
<div class="container">
  <br>
  @if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{\Session::get('success')}}</p>
			</div>
	@endif
  <div class="row">
    <div class="col-md-3">
      <div class="well" align='center'>
        <h3>ยอดเงินคงเหลือ</h3>
        <h1>{{$balance}}</h1>
      </div>
      <div id="add-button">
        <a href="{{url('balance')}}" class="btn btn-warning"><span class=" 	glyphicon glyphicon-edit"/>แก้ไขยอดเงิน</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <h2><span class="glyphicon glyphicon-time"></span> ประวัติการเดินทาง</h2>
    </div>
    <div class="col-md-4" align='right'>
      <a href="mrt/create" class="btn btn-primary"><span class=" 	glyphicon glyphicon-plus"/>เพิ่มประวัติ</a>
    </div>
  </div>
  <table class="table table-bordered">
    <thead>
      <th>ID</th>
      <th>ต้นทาง</th>
      <th>ปลายทาง</th>
      <th>ค่าโดยสาร</th>
      <th>วันที่</th>
      <th></th>
    </thead>
    <tbody>
      @foreach($trips as $row)
      <tr>
        <td>{{$row['trip_id']}}</td>
        <td>{{$row['origin']}}</td>
        <td>{{$row['destination']}}</td>
        <td>{{$row['fare']}}</td>
        <td>{{$row['created_at']}}</td>
        <td><form method="post" class="delete_form" action="{{action('MrtController@destroy',$row['trip_id'])}}">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" class="btn btn-danger">Delete</button>
						</form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_form').on('submit',function(){
			if(confirm("คุณต้องการลบข้อมูลหรือไม่?")){
				return true;
			}
			else {
				return false;
			}
		});
	});
</script>
@stop
