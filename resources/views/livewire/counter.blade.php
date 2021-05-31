<div class="feed">
	<div class="feedback2"><p class="mr-2 pr-2">feedback<i class="fas fa-chevron-down"></i></p></div> 
	<style type="text/css">
		.feedback{
			width: 20px;
			margin-left:5px;
			padding-left:5px; 
		}
		.feed{
			width: 224px;
			margin-bottom: 50px;
		}  
		.left{
			float: left;
		}
		.lf{
			margin-top: 20px;
		}
		.right1{
			float: left;
			width: 150px;
            height: 170px;
		}
		.right1 ul{
          display: inline
		}
		svg .star{
			background-color: yellow;
		}
		.feedback2 p{
         background-color: #36f53670;
         font-weight: bold;
        }
	</style>
   <div class="left lf">
   <button wire:click="increment" class="btn btn-normal">+</button><br>
   {{ $count }}<br>
   <button wire:click="decrement" class="btn btn-normal">-</button>
   </div>
   <div class="right1">
   	<ul>
   	<?php 
   	$z=5;
     for ($j=0; $j <5 ; $j++) { 
     ?>
   		<li>
<?php 
 if($z<5)
  {
  	for ($i=0; $i <5-$z ; $i++) {
      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#696969b5" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>';
  	}
  }
 ?>
 <?php 
     for ($i=0; $i <$z ; $i++) { 
  ?>
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ffc107" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
 <?php }  
  ?>
 </li><br>
<?php $z--; } ?>
   		
   	</ul>
   </div>
   
  <center>
  	<input class="btn btn-outline-dark ml-2" type="submit" value="publish" @auth wire:click="publish({{$idd}},{{Auth::user()->id}},{{ $count }})" @endauth>
  </center>
  
</div>
