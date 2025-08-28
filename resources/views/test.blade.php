
@extends('layout.base')
@section('main_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<h1>This is my title</h1>
<p class="alert alert-success" id="myparagraph">this is a paragraph</p>


@foreach($users as $users)

{{$users->name}}
<br>
@endforeach







