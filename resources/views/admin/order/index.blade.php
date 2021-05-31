@extends('dashboard')
@section('content')
<style type="text/css">
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
    border-top: 8px solid #424242;
    width: 40%;
    box-shadow: 0px 0px 25px #636363;
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
.hide{
	 margin-left: 96%;
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
</style>

	<h1 class="mr-4 pt-5 text-center">Orders</h1>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">		

<table class="table card-body text-center">
      <thead>
        <tr>
          <th>User</th>
          <th>Product</th>
          <th>Qte</th>
          <th>Status(Payied/NotYet)</th>
          <th>Delivery/Delivered</th>
          <th>Invoices</th>
        </tr>
      </thead>
      <tbody>
			@foreach($orders as $order)
			<tr>
			<td>{{$order->user_id}}</td>
			<td>{{$order->product_id}}</td>
			<td>{{$order->qte}}</td>
			<td>{{$order->status}}</td>
			<td><input class="btn btn-{{$order->status==0?'default':'success'}} float-center btn-sm" value="Delivery" {{$order->status==0?'disabled':''}} ></td>
			<td>
        <button  class="myBtn btn btn-{{$order->status==0?'default':'dark'}} float-center btn-sm" value="{{$order->id}}" type="submit" {{$order->status==0?'disabled':''}}>Show</button> 
      </td>
			</tr>
<div id="myModal" class="modal">
     <div class="modal-content">  
    <button class="hide float-right"><i class="fas fa-times"></i></button>
    <div id="printthis" class="text-center">
      <h1>Invoice</h1>
      <p>
        Product : {{$order->product_id}} <br>
        price : yyy <br>
        amount : {{$order->qte}}<br>
        user : 
     
        <br>
        tel : xxx xxx xxxx <br>
      </p>
    </div>
      <div class="modal-footer pt-0 pb-0">
        <h3>
            <button class="btn btn-dark" type="submit" onclick="pr(this)" value="{{$order->id}}">Print</button>
        </h3>
      </div>
    </div>
  </div>
			@endforeach		
	  </tbody>
</table>


<script type="text/javascript">
  function pr(ele){
  
 @foreach($orders as $order)
 
  
   
    var btnvalue=ele.value;
  
 if(btnvalue=={{$order->id}})
       {  
     var mywindow = window.open('', 'PRINT', 'height=500,width=800');

    
    mywindow.document.write('</head><body >');
    mywindow.document.write('<p>title : {{$order->product_id}} <br>price : yyy <br>amount : {{$order->qte}}<br>tel : xxx xxx xxxx <br></p>');
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
   
       
    return true;
     }
      @endforeach   
  }
  
    // Get the modal
var modal = document.getElementsByClassName('modal');

// Get the button that opens the modal
var btns = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("hide");

// When the user clicks on the button, open the modal 

for(let u=0; u<btns.length;u++) {
    btns[u].onclick = function() {
    modal[u].style.display = "block";
    //alert(btns[u].value);
    }
  }


// When the user clicks on <span> (x), close the modal
for(let e=0; e<btns.length;e++) {
span[e].onclick = function() {
    modal[e].style.display = "none";
}
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    		</div>	
    	</div>
    </div>

@endsection