<!DOCTYPE html>
<html>
<head>
	<title>BigShop</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/da21f2165d.js" crossorigin="anonymous"></script>
	<style type="text/css">
		*{
			margin: 0;
		}
		body{
			background-color: #2c2d2d36;
		}
	    .nav-bar{
			width: 100%;
			height: 50px;
			background-color: rgba(0.8,0.8,0.8,0.8);
		}
		.form{
			/*padding-top: 10px;*/
			margin-top:-30px;
			padding-right: 10px;
			float: right;
		}
		.form a{
			text-decoration: none;
			color: #ca00fd;
		}
		.form a:hover{
			color: #fff;
			font-weight: #ef07dd;
			background-color: #ca00fd;
		}
		 .login a{
            color: #fff;
			font-weight: #ef07dd;
        }
         .login a:hover{
         	padding: 10px 20px 10px 20px;
            color: dodgerblue;
			font-weight: #ef07dd;
			background-color:#fff;
			font-weight: bold;
        }
		#bar_menu{
			width: 100%;
			height: 70px;
			background-color:rgba(0.4,0.4,0.4,0.4);
			position: sticky;
			z-index: 1;
			top:0px;
		}
		/*nav bar2*/
		ul li {
            display: inline-block;
        }

		ul {
		    padding-top: 25px;
		    list-style-type: none;
		    text-align: center;
		}

	    ul li a {
	        text-decoration: none;
	        padding: 15px 20px;
	        border: 1px solid transparent;
	        transition: 0.2s ease;
	        color: #fff;
	    }

        ul li a:hover {
        	text-decoration: none;
            background-color: #fff;
            color: #000;
            text-shadow: 0.5px 0.5px;
            box-shadow: 10px 5px 5px dodgerblue;
        }
        .active{
        	background-color: #fff;
            color: #000;
            text-shadow: 0.5px 0.5px;
            box-shadow: 10px 5px 5px dodgerblue;
        }
        .active:hover{
        	background-color: #ca00fd;
        	color: #fff;
        }
        /*sub menu*/
		.sub_menu1{
			display: none;
		}
		#bar_menu ul li:hover .sub_menu1 {
	    display: block;
	    position: absolute;
	    background: rgba(0,0,0,0.8);
	    height: 250px;
	    width: 190px;
	    text-shadow:0.5px 0.5px;
	    margin-top: 15px;
	    border-top-right-radius: 20px;
	    border-bottom-left-radius: 20px;
	    z-index: 1;
	}

	    #bar_menu ul li:hover .sub_menu1 ul li {
	        display: block;
	        margin: 10px;
	        padding-bottom: 20px;
	        margin-left: -50px;
	    }
        .clock{
        	padding-top: 10px;
        	color: #fff;
        }
        svg{
        	float: right;
        	color: #0cfb1ec7;
        	padding-bottom: 8px;
        }
        svg:hover{
            color: #0cfb1e;
        }
        .badge{
          position: relative;
          left: -13px;
          top: -3px;
          z-index: 1;
          font-size: xx-small;
          border-radius:100%;
        }
        img{
        	 height: 200px;
        	 width: 400px;
        }
        .container{
        	 z-index: 0;
        	 margin-top: 80px;
        }

/*copierright*/
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
	/*height: 44px;
	max-height: 44px;*/
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
 /*https://www.w3schools.com/cssref/tryit.asp?filename=trycss3_text-overflow*/
 .pagination{
 	margin-top: 110px;
 	padding-top: 0px;
 }
 .footer0{
    text-align: left;
 	padding-top: 20px;
 	width: 100%;
	height: 150px;
	background-color: rgba(0.8,0.8,0.8,0.8);
  color: #e6e6e694;
 }
 .left{
  float: left;
  width: 33%;
  text-align: center;
 }
 .bar_footer a{
  text-decoration: none;
  color: #e6e6e694;
 }
 .bar_footer a:hover{
  color: white;
 }
 .left svg{
  float: left;
  border: 0.2px solid white;
  border-radius: 20%;
  display: inline;
  margin-left: 20%;
  padding-top: 7px;
  margin-top: 10px;
 }
 .left svg:hover{
  background-color: white;
 }
 .center{
  float: left;
  width: 33%;
  border:0.2px solid white;
  border-top: none;
  border-bottom: none;
  text-align: center;
  margin-top: 0;
 }
 .right{
  float: left;
  width: 33%;
  text-align: center;
 }
 .footer{
 	text-align: center;
 	padding-top: 20px;
 	width: 100%;
	height: 50px;
	background-color: rgba(0.4,0.4,0.4,0.4);
	color: #f9f9f9a8;
	font-size: xx-small;
 }
 footer{
 	margin-top: 430px;
 }
 .dir1{
 	margin-left: 40%;
 	width: 100%;
 }
 hr{
 	background-color: white;
 	margin: 0;
 }
 span{
 	z-index: 0;
 }
 .upicon{
  float: left;
 }
 .dark-mode {
  background-color: #000000c7;
  color: white;
}
 .btn-dark
 {
  border-radius: 100%;
  margin-left: 5px;
  font-size: 10px;
 }
  .lang,.mony
 {
    background-color: #343a40;
    color: white;
    border-radius: 10px;
    height: 30px;
    margin-left: 5px;
 }
 [data-theme="dark"] {
  background-color: #464646 !important;
  color: #eee;
 }
 .line{
   display: inline;
   margin-left: 4px;
   top: 5px;
 }
	</style>

</head>
<body>
	<nav class="nav-bar">
		<dir class="clock"><?php echo 'Now : '. date('Y-m-d | H:i:s') ."\n";?>
    <div class="custom-control custom-switch line">
  <input type="checkbox" class="custom-control-input" id="darkSwitch" />
  <label class="custom-control-label" for="darkSwitch"></label>
    </div>
     <!--language-->
       <select class="lang">
        <option disabled selected>lang</option>
         <option>AR</option>
         <option>EN</option>
         <option>FR</option>
         <option>ES</option>
       </select>
       <!--Money $-->
       <select class="mony">
         <option>USD</option>
         <option>EUR</option>
         <option>MAD</option>
       </select>
    </dir>
		@auth
		<form class="form" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('| Logout') }}
                    </x-jet-responsive-nav-link>
        </form>
        @else
         <dir class="form login">
         	<a href="/register">Sign Up</a>
         	<a href="/login">| Login</a>
         </dir>
        @endauth
	</nav><hr>
    <div id="bar_menu">
    	<ul>
    		<li><a href="{{route('home')}}" class="active">HOME</a></li>
        <!--<li><a href="/dashboard">Dashboard</a></li>-->
    		<li><a href="{{route('allproducts')}}">Products</a> 
    	    <div class="sub_menu1">
             <ul>
             	<li><a href="{{route('clothes')}}">Clothes</a></li>
             	<li><a href="{{route('sacs')}}">Sacs</a></li>
             	<li><a href="{{route('accessoires')}}">Accessoires</a></li>
             	<li><a href="{{route('others')}}">Others</a></li>
             </ul>
            </div>
    		</li>
    		<li><a href="/About">About Us</a></li>
    		<li><a href="/Contact">Contact Us</a></li>
	<a <?php 
           if(Auth::user())
           {
            echo 'href="/Mycard"';
           }
          ?>
    > <span class="badge badge-light float-right">
      @auth
       {{$cards_count}}
      @endauth
    </span>	
	<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
</a>
    	</ul>
    </div>
    
    <script type="text/javascript">
      /*Dark Mode*/
    const darkSwitch = document.getElementById('darkSwitch');
window.addEventListener('load', () => {
  if (darkSwitch) {
    initTheme();
    darkSwitch.addEventListener('change', () => {
      resetTheme();
    });
  }
});
function initTheme() {
  const darkThemeSelected =
    localStorage.getItem('darkSwitch') !== null &&
    localStorage.getItem('darkSwitch') === 'dark';
  darkSwitch.checked = darkThemeSelected;
  darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') :
    document.body.removeAttribute('data-theme');
}
function resetTheme() {
  if (darkSwitch.checked) {
    document.body.setAttribute('data-theme', 'dark');
    localStorage.setItem('darkSwitch', 'dark');
  } else {
    document.body.removeAttribute('data-theme');
    localStorage.removeItem('darkSwitch');
  }
}
    </script>
        <span id="UP"></span>
        <div class="text-right mr-4">
        @include('users.menus.search')
        </div>
        <div class="container mt-4">
  @if(session()->has('success_message'))
      <div class="alert alert-success">
        {{session()->get('success_message')}}
      </div>
  @endif
  @if(count($errors)>0)
      <div class="alert alert-danger">
        <ul class="pt-0 mb-0">
         @foreach($errors->all() as $error)
         <li>{{$error}}</li> 
         @endforeach
        </ul>
      </div>
  @endif
</div>
<br><br>
<dir class="container">
	<dir class="row">
		
		@foreach($posts as $post)	     
      	<a href="/product/{{$post->id}}/show">
      	<dir class="col-lg-3 col-md-4 col-sm-6">
      	<dir class='img-thumbnail item-box'>
      	<span class="price-tag">300$</span>
      	<img class='img-responsive' src="{{asset('storage/'.$post->image)}}" alt='product[image]'/>
        <dir class='caption'>
      	<h3><a href='/product/{{$post->id}}/show'>{{$post->title}}</a></h3>
      	<dir class='date'>{{$post->created_at}}</dir>
      	</dir>
      	</dir>
      	</dir>
      	</a>
		@endforeach
        <span class="dir1">
        	{{$posts->links()}}
        </span>
	</dir>
  </dir> 
 <div class="upicon">
    <a href="#UP">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#007bff" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
      </svg>
    </a>
  </div>
<footer>
 <hr>
 <div class="footer0">
  <div class="left bar_footer">
    <span><a href="/home">Our WebSite</a></span><br>
    <span><a href="www.facebook.com" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#1877f2" class="bi bi-facebook" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg></a></span>
    <span>
<a href="www.twitter.com" target="_blank">
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgba(29,161,242,1.00)" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
  </svg>
</a></span>
    <span>
<a href="www.instagram.com" target="_blank">
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd5949" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
  </svg>
</a></span>
  </div>
  <div class="center bar_footer">
    <span><a href="faq">FAQ</a></span><br>
    <span><a href="/About">About Us</a></span><br>
    <span><a href="/Contact">Contact Us</a></span><br>
    <span><a href="/Products">Products</a></span><br>
    <span><a href="/Support">Support Us</a></span>
  </div>
  <div class="right">
    <p>
    <b>About:</b><br>
    <u>BigShop</u> is a web application E-commerce<br> for buying and selling more different<br> products...<a href="/About" class="text-info">Read More</a>   
    </p>
  </div>
 </div><hr>
  	<div class="footer">Created by No Name.© <?php echo date('Y'); ?> All CopierRight Reserved.
  	</div>
  </footer>
</body>
</html>
