@extends('dashboard')

@section('content')
   <div class="card card-default">
   	<div class="card-header">{{isset($tag)?'Update Tag':'Add a new Tag'}}</div>
   	<div class="card-body">
   		<form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">
   			@csrf
            @if(isset($tag))
               @method('PUT') <!--For update-->
            @endif
   			<div class="form-group">
   				<label for="tag">Tag Name:</label>
   				<input type="text" class="@error('name') is-invalid @enderror form-control" placeholder="add a new tag" name="name" value="{{isset($tag)?$tag->name:''}}">
   				@error('name')
   				  <div class="alert alert-danger">
   				  	{{$message}}
   				  </div>
   				@enderror
   			</div>
   			<div class="form-group">
   				<button href="#" class="btn btn-success">{{isset($tag)?'Update':'Add'}}</button>
   			</div>
   		</form>
   	</div>
   </div>
@endsection