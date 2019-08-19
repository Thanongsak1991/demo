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
    </div>
  </div>
  <!-- ตารางการเติมเงิน -->
  <div class="row">
      <h2><span class="glyphicon glyphicon-time"></span> ประวัติการเติมเงิน</h2>
      <div align='right'>
        <a href="{{url('balance/create')}}" class="btn btn-warning"><span class=" 	glyphicon glyphicon-plus"/>เพิ่มยอดเงิน</a>
      </div>
      <table class="table table-bordered">
        <thead>
          <th>id</th>
          <th>จำนวน</th>
          <th>วันที่</th>
          <th></th>
        </thead>
        <tbody>
          @foreach($balances as $row)
          <tr>
            <td>{{$row['balance_id']}}</td>
            <td>{{$row['amount']}}</td>
            <td>{{$row['created_at']}}</td>
            <td><form method="post" class="delete_form" action="{{action('BalanceController@destroy',$row['balance_id'])}}">
    							{{csrf_field()}}
    							<input type="hidden" name="_method" value="DELETE" />
    							<button type="submit" class="btn btn-danger">ลบ</button>
    						</form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@stop
