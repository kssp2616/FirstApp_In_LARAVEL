@extends('dashboard')
 
@section('content')
   @if(session()->has('error'))
    <div class="alert alert-danger">
      {{session()->get('error')}}
    </div>
   @endif
  <div class="clearfix">
  <a href="{{route('tags.create')}}" class="btn float-right btn-primary" style="margin-bottom:10px ">Add Tag</a>
  </div>
   <div class="card card-default">
      <div class="card-header">All Tags</div>
      <table class="table card-body">
         <tbody>
         @foreach($tags as $tag)
         <tr>
            <td>
               {{$tag->name}}<span class="badge ml-2 badge-dark">{{$tag->posts->count()}}</span> 
            </td>   
            <td>
              <form class="float-right ml-2" action="{{route('tags.destroy',$tag->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm">Delete</button>
              </form>
               <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
            </td>          
         </tr>
         @endforeach
         </tbody>
      </table>
   </div>
@endsection