@extends('layout.main_layout')
@section('title','Home Index')
@section('content')
<div class='container'>
  <h1>Index Home</h1>
  <div>
    <table class="table table-bordered">
      <thead>
        <th>user</th>
        <th>name</th>
        <th>city</th>
        <th>password</th>
      </thead>
      <tbody>
        @foreach($members as $row)
        <tr>
          <td>{{$row['user']}}</td>
          <td>{{$row['name']}}</td>
          <td>{{$row['city']}}</td>
          <td>{{base64_decode($row['password'])}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
