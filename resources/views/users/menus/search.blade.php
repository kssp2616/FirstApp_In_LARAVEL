<style type="text/css">
	    .search-form{
	    	margin-top: 5px;
	    }
	    .search-box{
            border: 0.2px solid grey;
            width: 30%;
            height: 30px;
            padding-left: 10px;
            background-color: white;
        }
        .search-box:focus{
        	font-weight: bold;
        }

</style>
<form action="/search" method="GET" class="search-form">
	<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="grey" class="bi bi-search" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
   </svg>
	<input type="text" name="query" value="{{request()->input('query')}}" class="search-box" placeholder="Search for product">
</form>
