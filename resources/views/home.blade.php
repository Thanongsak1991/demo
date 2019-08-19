@extends('layout.main_layout')
@section('title','welcome home')
@section('content')
<h1>hello world</h1>
<div class="container">

      <div id="jsGrid"></div>
      <div id="label" style="color:blue"> </div>
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p id='name'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


</div>
<script>
  var clients = [{
                  "First Name": "Otto Clay",
                  "Age": 25,
                  "Country": 1
                  }, {
                  "First Name": "Connor Johnston",
                  "Age": 45,
                  "Country": 2
                  }, {
                  "First Name": "Lacey Hess",
                  "Age": 29,
                  "Country": 3
                  }, {
                  "First Name": "Timothy Henson",
                  "Age": 56,
                  "Country": 1
                  }, {
                  "First Name": "Ramona Benton",
                  "Age": 32,
                  "Country": 3
  }];

  $("#jsGrid").jsGrid({
  width: "100%",
  height: "300px",
  inserting: false,
  editing: false,
  sorting: true,
  paging: true,
  data: clients,
  selecting: true,
  fields: [{
    name: "First Name",
    title:"ชื่อ",
    width: 150
  }, {
    name: "Age",
    title:"อายุ",
    width: 50
   },
  //{
  //   name: "Country"
  // }
  ],
  rowClick: function(args) {
    console.log(args)
    var getData = args.item;
    var keys = Object.keys(getData);
    var text = [];

    $.each(keys, function(idx, value) {
      text.push(value + " : " + getData[value])
    });

    //$("#label").text(text.join(" "))
    //alert(text[0]+'\n'+text[1] )
    $("#myModal").modal();
    $("#name").text(text.join(","));

    // window.open('/','popUpWindow','height=500,width=400,
    // left=100,top=100,resizable=yes,scrollbars=yes,
    // toolbar=no,menubar=no,location=no,
    // directories=no, status=no');
  }
  });
</script>
@stop
