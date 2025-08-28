@extends('layout.base')
@section("main_content")
<div class="main container ">
  @if($errors->any())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    {{$error}}
  </br>
    @endforeach
  </div>
  @endif
<form class="form-group-container mt-4" action="{{route('task.store')}}" method="POST">
    @csrf
  <div class="form-group ">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control"  name="description"></textarea>
  </div>
  <div class="form-group ">
    <label for="exampleInputEmail1">Order</label>
    <input type="text" name="order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection