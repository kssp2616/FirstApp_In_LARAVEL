@extends('dashboard')
@section('content')
<div class="clearfix">
  <a href="/categories/create" class="btn float-right btn-primary" style="margin-bottom:10px ">Add Category >></a>
  </div>
<div class="card card-default">
    <div class="card-header">All Categories<span class="text-success">({{$categories->count()}})</span></div>
<table class="table card-body">
      <tbody>
      @foreach($categories as $cat) 
      <tr>
            <td class="font-weight-bold">
              {{$cat->name}}
            </td>   
            <td>
              <form class="float-right ml-2" action="{{route('categories.destroy',$cat->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm">Delete</button>
              </form>
              <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
            </td>
      </tr>
       @endforeach
      </tbody>
    </table>
</div>
@endsection




   