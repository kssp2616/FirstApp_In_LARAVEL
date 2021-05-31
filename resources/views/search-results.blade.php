@extends('navbar')
@section('content')
<style type="text/css">
	.item-box{
	position: relative;
}
.item-box .price-tag{
	 background-color: #dc3545;
	 padding: 2px 10px;
	 position: absolute;
	 left: 0;
	 top: 10px;
	 font-weight: bold;
	 color: #FFF;
	 z-index: 0.5;
}

.item-box .caption p{
	height: 44px;
	max-height: 44px;
}
 .item-box{
 	background-color: #f1f1f124;
 	margin-top: 10px;
 }
 .item-box:hover{
 	background-color: #f1f1f199;
 }
 h3{
    white-space: nowrap;
    width: 100px;
    overflow: hidden;
    text-overflow: clip;
 }
 h3 a:hover{
    text-decoration: none;
    color:#dc3545;
 }
 img{
	 height: 150px;
	 width: 300px;
    }
 .forbottom{
  margin-bottom: 300px;
 }
 .forbottom2{
  margin-bottom: 80px;
 }
</style>
<div class="container">
  <span id="UP"></span>
	@if(session()->has('success_message'))
      <div class="alert alert-success">
      	{{session()->get('success_message')}}
      </div>
	@endif
	@if(count($errors)>0)
      <div class="alert alert-danger">
      	<ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li> 
      	 @endforeach
      	</ul>
      </div>
	@endif
</div>
<dir class="container forbottom2">
	<h1>Search Results</h1>
	<p>{{$products->total()}} result(s) for '{{request()->input('query')}}'
	</p><hr>
	<dir class="row">
 @foreach($products as $product)
		<a href="/product/{{$product->id}}/show">
      	<dir class="col-lg-3 col-md-4 col-sm-6">
      	<dir class='img-thumbnail item-box'>
      	<span class="price-tag">300$</span>
      	<img class='img-responsive' src="{{asset('storage/'.$product->image)}}" alt='product[image]'/>
        <dir class='caption'>
      	<h3><a href='/product/{{$product->id}}/show'>{{$product->title}}</a></h3>
      	<p>{{$product->description}}</p>
      	<dir class='date'>{{$product->created_at}}</dir>
      	</dir>
      	</dir>
      	</dir>
      	</a>
@endforeach
    </dir>
{{$products->appends(request()->input())->links()}}
  </dir> 
 <div class="upicon">
    <a href="#UP">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#007bff" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
      </svg>
    </a>
  </div>
  @if($products->total()==0)
  <div class="forbottom"></div>
  @endif
  @endsection