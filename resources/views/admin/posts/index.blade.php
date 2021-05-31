@extends('dashboard')

@section('content')
   <div class="clearfix">
  <a href="{{route('posts.create')}}" class="btn float-right btn-primary" style="margin-bottom:10px">Add Post</a>
  </div>
   <div class="card card-default">
   	<div class="card-header">All Posts</div>
   	@if($posts->count()>0)
    <table class="table card-body">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($posts as $post)
      <tr>
            <td>
              <style type="text/css">
               img{
                height: 100px;
                width : 100px;
               }
              </style>
              <img src="{{asset('storage/'.$post->image)}}" ><!--before u need to exe in cmd(php artisan storage:link)-->
            </td>  
            <td>
              {{$post->title}}
            </td>  
            <td>
              <form class="float-right ml-2" action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm">{{$post->trashed()?'Delete':'Trash'}}</button>
              </form>
              @if(!$post->trashed())
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
              @else
              <a href="{{route('trashed.restore',$post->id)}}" class="btn btn-success float-right btn-sm">Restore</a>
              @endif
            </td>       
      </tr>
      @endforeach
      </tbody>
    </table>
    @else
    <div class="card-body">
    <h3 class="text-center" style="text-shadow: 2px 2px">No Posts Yet.</h3>
    </div>
    @endif
   </div>
@endsection