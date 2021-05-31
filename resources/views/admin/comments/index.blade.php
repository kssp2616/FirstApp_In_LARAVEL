@extends('dashboard')


@section('content')
<style type="text/css">
	.comment{
		color: #08c6ff;
	}
</style>
<div class="container">
	<h1 class="mr-4 pt-5 text-center">Comments</h1>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="row justify-content-center">Content</span>
					<span class="badge badge-warning float-right">
					</span>
					<div class="card-body">
						<hr>
						@foreach($comments as $comment)
						<p class="comment">{{$comment->content}}<span class="btn btn-danger float-right btn-sm">Delete</span></p>
						<hr>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection