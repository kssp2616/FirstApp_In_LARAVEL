<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <center>{{ __('BigShop Dashboard') }}</center>
        </h2>
    </x-slot>
   <style type="text/css">
       .nav-tabs  a{
        color:black;
        font-weight: bold;
       } 
       
       .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        background-color:#d4d4d466;
       }
       .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active:hover{
        background-color: black;
       }
       .icons{ 
        font-size: xx-large;
       }
       .with_icon{
        padding-left: 5px;
        font-weight: bold;  
       }
   </style>
    <script src="https://kit.fontawesome.com/da21f2165d.js" crossorigin="anonymous"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
               <!-- <x-jet-welcome />HERE--> 
       
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
            
               
            <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/orders">Orders</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('trashed.index')}}">Trashed Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('comments.index')}}">Comments</a>
                  </li>
            </ul>
       
  
        <div class="col-md-9 py-9 pull-right mt-2">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="card text-black bg-default">
                        <div class="card-header">Users</div> 
                        <div class="card-body with_icon">
                            <i class="fas fa-users icons"></i>
                            {{ $users->where('groupid',0)->count()
                              }}
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-black bg-default">
                        <div class="card-header">Posts</div>
                        <div class="card-body with_icon">
                          <i class="fas fa-shopping-bag icons"></i>
                            {{ $posts->count() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-black bg-default">
                        <div class="card-header">Categories</div>
                        <div class="card-body with_icon">
                          <i class="fas fa-sitemap icons"></i>
                        {{$categories->count()}}          
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-black bg-default">
                        <div class="card-header">Orders</div> 
                        <div class="card-body with_icon">
                            <i class="fas fa-truck icons"></i>
                            {{ $orders->where('groupid',0)->count()
                              }}
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-8">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>       
   </div>
</div>
   
</x-app-layout>
