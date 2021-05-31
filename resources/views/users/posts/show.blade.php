@extends('navbar')
@section('content')
<style type="text/css">
	body{
		background-color: #2c2d2d36;
	}
	.container{
		margin-top: 50px;
	}
	.title:hover{
		color: #ca00fd;
	}
	.title{
		color: #007bff;
	}
	.comments{
		margin-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		color: #afffb2;
		font-family: cursive;
		border: 0.3px solid rgba(0.4,0.4,0.4,0.4);
		border-top-left-radius: 20px;
		border-top-right-radius: 20px;
		background-color: #040427; 
	}
	.comments h5{
		color: #00BCD4;
		background-color: #00ffa754;
		border:0.2px solid #00ffa754;
		box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);
		padding-left: 5px;
		border-bottom: none;
	}
	label{
		color: #c7c7c7;
	}
	.buy{
		float: right;
		width: 40%;
		margin-top: 18px;
		padding-left: 14px;
	}
	.buy .btn-warning{
		color: white;
	}
	.showimg{
		width: 60%;
		float: left;
	}
	.item-box{
		width: 80%;
		background-color: #ffffff7a;
	}
	hr{
		width: 100%;
	}
	@media screen and (max-width: 1216px) {
	  .showimg{
		width: 50%;
	    }
	    .buy{
	    	width: 60%;
	    }
    }
    @media screen and (max-width: 992px) {
	  .showimg{
	  	width: 100%;
	  	margin: 0;
	  	padding: 0;
	    }
	    .buy{
	    	padding: 0;
	    	margin: 0;
	    	width: 100%;
        float: left;
        margin-left: 70px;	
	    }
      .img-thumbnail {
        margin-left: 19px;
      }
    }
    @media screen and (max-width: 755px) {
      .img-thumbnail {
        margin-left: 0px;
      }
    }
</style>
 <style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border-top: 8px solid #FFC107;    width: 60%;
    box-shadow: 0px 0px 25px #636363;
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
p {
		color: black;
	}
.footer0 p{
  color: #e6e6e694;
}
h2 {
color : #726198;}
h3 {
color : #726198;}
.close {
    margin-left: 5px;
    color: white;
    background: #ffc107 ;
    border: 2px solid rgba(255, 152, 0, 0.49);
    border-radius: 3px;
    padding: 5px 30px 5px 30px;
    float: right;
    font-family: sans-serif;
    cursor: pointer;
    box-shadow: 2px 2px 20px #fff;
    transition: box-shadow 0.3s;
}
.close:hover,
.close:focus {
    box-shadow: 2px 2px 20px #9e9e9e;
  
}
.conti{
    text-decoration: none;
    font-weight: bold;
    color: white;
    background: #0745ff;
    border: 2px solid rgb(7,69,255);
    border-radius: 3px;
    float: right;
    font-family: sans-serif;
    cursor: pointer;
    box-shadow: 2px 2px 20px #fff;
    transition: box-shadow 0.3s;
}
.conti:hover{
	color: #9e9e9e;
	text-decoration: none;
}
.conti:hover,
.conti:focus {
    box-shadow: 2px 2px 20px #9e9e9e;

}
.modal-header {
    padding: 2px 16px;
    color: #616161;
    margin-right: 5px;
    margin-left: 5px;
    border-bottom: 1px solid #a7a7a7;
}
.modal-body { color :#616161;
background-position:center ;
padding-top: 0px;
}
.modal-body p{
  margin-top: 0;
}
.modal-footer {
    padding: 2px 16px;
    color: #616161;
    margin-right: 5px;
    margin-left: 5px;
    border-top: 1px solid #a7a7a7;
}
.ftr{
  margin-right: 20px;
  float:left;
}
.feedbackresult{
  font-size: 30px;
}
img{
  margin-top: 12px;
}
.result{
  float: left;
}
</style>
 <!--Show Product Card-->
<dir class="container">
	<dir class="row">
      	
      	<dir class='img-thumbnail item-box'>
      	<div class="showimg col-sm-12 col-md-12 col-lg-6">
      	<img class='img-thumbnail img-responsive' src="{{asset('storage/'.$posts->image)}}" alt='product[image]' height="400px" width="500px" style="
    height: 337px;" />
      	<hr class="mt-2">
        <dir class='caption'>
      	<h3 class="title">{{$posts->title}}</h3>
      	<h4 class="price-tag">Current price : 300$</h4>
      	<p>Description : {{$posts->description}} <br> 3 reviews </p>
      	<dir class='date'>Date : {{$posts->created_at}}</dir>
      	</dir>
        </div>
        
        <div class="buy col-sm-12 col-md-6 col-lg-6  ">
          <span>Feedback Results :</span>
          <span class="feedbackresult">
            @if($rats!=null && $rats % 2!=0)
              {{$rats}}.0
            @elseif($rats % 2==0)
              {{$rats}}
            @else
              0
            @endif
          </span>/5<br>
          <p class="result">
             @if($rats<5)
         @for ($i = 0; $i < 5-$rats; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#696969b5" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>
          @endfor
          @endif
           @for ($i = 0; $i < $rats; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ffc107" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>
          @endfor
        </p> <br> 
          @livewire('counter') 
          @livewireScripts
     <form method="POST" action="{{ route('pay') }}">
        @csrf
        <input type="hidden" name="user_id" <?php 
           if(Auth::user())
           {
            echo 'value=';?>
            {{Auth::user()->id}}
            <?php
            echo '';
           }?>
          >

        <input type="hidden" name="price" value="4"><!--{{$posts->price}}-->
        <input type="hidden" name="title" value="{{$posts->title}}">




        <input type="hidden" name="item_id" value="{{$posts->id}}">
        <input type="hidden" name="qte" value="1">

        	<input id="myBtn" formaction="{{url('/payment')}}" class="btn btn-outline-dark" type="submit" value="Buy Now">
        	<input class="btn btn-outline-dark" type="submit" value="Add To Card" formaction="{{url('/Mycard')}}">
        </div>
        </form>
      	</dir>
      		
	</dir>
  </dir>
<!--
@if(!Auth::user())
<form action="/payment" name="form4" method="POST">
        @csrf
  <div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Complete the purchase by payment</h2>
    </div>
  
        <div class="modal-body">
        <br>
      <p class="textlog">Email :</p>
     <input type="email" name="email" class="form-control">
       <p class="textlog">Password :</p>
      <input type="password" name="password" class="form-control">
      <a href="/register" class="float-right mr-4">Create an account?|Sign Up</a>
    </div>
    <div class="modal-footer">
      <h3><span class="ftr">Window private for payment</span> <a class="close">Close</a><a href="/login" class="conti">Continue</a></h3>
    </div>
  </div>
</div>
</form>
@endif
-->
<script>
// Get the modal
/*var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/
</script>
<!--Comments-->
  <div class="comments">
@if(Auth::user()!=null)
  	@foreach($comments as $comment)
	  	@if(Auth::user()->uid==$comment->user_id)
	  	<h5>{{Auth::user()->name}} : {{$comment->content}}</h5>
	  	@else
		  
		  	   @foreach($names as $name)
		  		@if($comment->user_id==$name->uid)
		  		  {{$name->name}}
		  		  @break
		        @endif
		       @endforeach
		  		: {{$comment->content}}
		    <br>
	  	@endif
  	@endforeach
@endif
<form method="POST" action="/product/{{$posts->id}}/show">
	@csrf
	<div class="form-group">
		<label for="body">Add Comment : </label>
		<textarea name="content" id="body" class="form-control" placeholder="Enter your opinion here..."></textarea>
	</div>
	<input type="hidden" name="post_id" value="{{$posts->id}}">
	<input type="hidden" name="user_id" value="
    @if(Auth::user()!=null)
	{{Auth::user()->uid}}
	@endif">
	<div class="form-group">
		<button type="submit" class="btn btn-primary"
		>Add Comments!</button>
	</div>
</form>
</div>
@endsection