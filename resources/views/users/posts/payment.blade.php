@extends('navbar')
@section('content')          
	<style type="text/css">
		select,h5{
			display: inline;
		}
		.card-header{
		  background-color: rgb(65 208 122 / 6%);
		}
		.card-footer{
		  background-color: rgb(65 208 122 / 6%);
		}

.modal{
		display: none; 
	}
.card {
    position: relative;
    margin: auto;
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
body{
	background-color: #2c2d2d36;
}
.forbottom{
  margin-bottom: 230px;
}
	</style>

<center>
<br><br><br>
<button class="btn btn-primary forbottom" id="myBtn"><i class="far fa-credit-card"></i> by Paypal</button>

<br>
<div class="container mt-4 mb-4">
<div class="card modal" id="myModal">
	<div class="card-header">Add a credit or debit card
    <i class="far fa-credit-card"></i></div>
	<form action="" method="">
		@csrf
	<div class="card-body">
		
	  <hr><i class="fab fa-paypal text-primary btn-lg" style="background-color: #f3e70530;width: 100%;"></i><hr>
		Card number :<input class="form-control" placeholder="Number of card" type="text" name="number" pattern=""><br>
		Name on card :<input class="form-control" placeholder="Name of card" type="text" name="name"><br>
	<div class="cell colspan3">
	  <div class="input-control select full-size">
	  	Expiration date :
	   <span class="text-center ml-4">
	    <select id="cboMonth" class="dropdown">
	      <option value="0" selected disabled hidden>Month</option>
	    </select>	    
	    <select id="cboYear" class="dropdown">
	      <option value="0" selected disabled hidden>Year</option>
	    </select>
       </span>
	  </div>
	</div>
<script type="text/javascript">
 function setOpt(selector, text, value) {
  var node = document.querySelector(selector);
  var opt = document.createElement("option");
  opt.text = text;
  opt.value = value;
  node.add(opt);
  return false;
}

function T(t) {
  var now = new Date();
  var time;
  switch (t.toLowerCase()) {
    case 'm':
      time = now.getMonth() + 1;
      break;
    case 'd':
      time = now.getDate();
      break;
    case 'y':
      time = now.getFullYear();
      break;
    default:
      break;
  }
  return time;
}
for (let i =2030 ; i >= T('y') ; i--) {
  setOpt('#cboYear', i, i);
}
for (let i = 1; i <= T('m'); i++) {
  if(i<10)
  {
    setOpt('#cboMonth', "0"+i, i);
  }else{
  	setOpt('#cboMonth', i, i);
  }
  
}
</script>	
		
	</div>
	<div class="card-footer">
		<button class="btn btn-success">Add your card</button>
		<button class="btn btn-info" class="close">Cancel</button>
	</div>
	</form>
</div>
</div>
<script type="text/javascript">
	
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
    modal.style.marginTop="-230px";
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
}


</script>
</center>
@endsection