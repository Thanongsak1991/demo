@extends('layout.mrt-layout')
@section('title','MRT Record')
@section('content')
<div class="container">
  <br>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <form action="{{url('balance')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="number" name="amount" class="form-control" placeholder="จำนวนเงิน" />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="เพิ่มยอดเงิน" />
        </div>
      </form>
    </div>
  </div>
</div>
@stop
