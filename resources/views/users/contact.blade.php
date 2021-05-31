@extends('navbar')
@section('content')
<style type="text/css">
	body{
		background-color: #2c2d2d36;
	}
	.textarea{
		height: 100px;
		width: 300px;
	}
	.title{
		color: rgb(0, 123, 255);
		text-shadow: 2px 2px;
	}
	label{
		color: white;
		font-weight: bold;
	}
</style>
<center><h1 class="title">Contact Us</h1></center>
<br><hr><br>
@if(session()->has('message'))
    <div class="container alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form action="/Contact" method="post" class="container">
	@csrf
	<div class="form-group">
		<label for="name">Name : </label>
		<input class="form-control" type="text" name="name">
	</div>
	<div class="form-group">
		<label for="name">Email : </label>
		<input class="form-control" type="email" name="email">
	</div>
	<div class="form-group">
		<label for="name">Subject : </label>
		<input class="form-control" type="text" name="subject">
	</div>
	<div class="form-group">
		<label for="name">Body : </label>
		<textarea class="form-control" rows="4" type="text" name="body"></textarea>
	</div>
	<div class="form-group pull-right">
		<button class="btn btn-primary">Send</button>
	</div>
</form>
@endsection