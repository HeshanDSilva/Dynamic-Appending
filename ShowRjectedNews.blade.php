@extends('layouts.master')

@section('content')
<div class="content-wrapper ScrollStyle vl table-dark">
<div class="container">
<br>
  @include('inc.Errors')
</div>
<div class="container">
<div class="page-header text-center table-dark" style="border-radius:8px;border:2px solid #85144b;">
  <h3>All Rejected News</h3>
</div>
</div>
<div>
@foreach($tuple as $tuples)
<div class="container">
  <div class="align-items-center p-3 my-3 text-#85144b-50 alert-success rounded shadow-sm" style="border-radius:8px;border:2px solid #fff;" id="{{$tuples->id}}">
      <div class="row alert-success">
              <div class="col-md-4">
                <h5 style="padding-left:15px"><span class="dot1"></span> {{$tuples->head}}<h5>
              </div>
              <div class="col-md-4">
                <h5><span class="dot1"></span> {{$tuples->body}}</h5>
              </div>
              <div class="col-md-4">
                <h5><span class="dot1"></span> {{$tuples->tail}}</h5>
            </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-4" style="border-right:2px solid white;">
          <br>
          <p> Added By {{$tuples->AddedBy}} At {{$tuples->created_at}}</p>
        </div>
        <div class="col-md-4" style="border-right:2px solid white;">
          <br>
          <p> Rejected By {{$tuples->CheckedBy}} At {{$tuples->updated_at}}</p>
      </div>
      <div class="col-md-4">
      <small> {{$tuples->rejected_reason}}</small>
        <hr>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-4">
            <small><button class="btn-sm editnews btn-danger" data-id="{{$tuples->id}}" type="button"><i class="fa fa-edit"></i> Edit</button></small>
          </div>
          <div class="col-md-5">
            <a href="#" data-id="{{$tuples->id}}" class="sa-remove"><small><button class="btn-sm removeSlid btn-danger wave-effect btn-bordred wave-light" type="button"><i class="fa fa-times"></i> Delete</button></a></small>
        </div>
    </div>
  </div>
</div>
</div>
@endforeach
</div>
</div>
<script type="text/javascript">
$('.sa-remove').click(function () {
           var postId = $(this).data('id');
           swal({
               title: "are u sure?",
               text: "This will be permanently deleted",
               type: "error",
               showCancelButton: true,
               confirmButtonClass: 'btn-danger waves-effect waves-light',
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               closeOnConfirm: true,
               closeOnCancel: true
           },
           function(){
               window.location.href = "/delete/news/" + postId;
           });
});
</script>
<script type="text/javascript">

var max;
max=0;
$(document).ready(function(){
  $(".editnews").click(function(e){
    var postId = $(this).data('id');
    if(max<1){
    e.preventDefault();
    alert(postId);
    $("#"+postId).append( ' </p> hello </p>' );
    max++;
  }
  });
});
</script>
@endsection
