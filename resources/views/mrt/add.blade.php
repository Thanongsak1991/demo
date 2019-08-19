@extends('layout.mrt-layout')
@section('title','MRT Record')
@section('content')
<div class="container">
  <br>
  <form method="post" action="{{url('mrt')}}" >
    {{csrf_field()}}
    <div class="form-group">
      <label for='origin'>ต้นทาง</label>
      <select id='origin' name='origin' class="form-control">
        @foreach($stations as $item)
        <option value="{{$item['station_value']}}" >
          {{$item['station_code']}}: {{$item['station_name']}}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for='origin'>ปลายทาง</label>
      <select id='origin' name='destination' class="form-control">
        @foreach($stations as $item)
        <option value="{{$item['station_value']}}" >
          {{$item['station_code']}}: {{$item['station_name']}}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <input class="btn btn-success" type="submit" value="บันทึก" />
    </div>
  </form>
</div>
@stop
