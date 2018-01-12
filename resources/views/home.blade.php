@extends('layouts.master')

@section('content')

<div class="col-md-3 hidden-xs" >
	<div class="col-md-12 col-xs-12" id="primarypic" style="z-index: 1;">
		<img src="images/
		<?php 
				if ($restaurantId==1) {echo "1001.jpg";}
				else if ($restaurantId ==2) {echo "Homestyle Taste.jpg";}
				else if ($restaurantId ==3) {echo "Sze Chuang Cuisine.jpg";}
				else if ($restaurantId ==4) {echo "Go4Food.png";}
				else if ($restaurantId ==5) {echo "Cai.jpg";}
		?>" width="100%;" height="300px" />
	</div>
	<div class="col-md-12 col-xs-12 column" style="font-size:1.5em; color:FFFFFF;text-align:center; float:left;">
		<div id="contactinfo">Contact Phone: 
		<?php 
			if ($restaurantId==1) {echo "(312)842-9677";}
			else if ($restaurantId ==2) {echo "(312)949-9328";}
			else if ($restaurantId ==3) {echo "(312)791-1882";}
			else if ($restaurantId ==4) {echo "(312)842-8688";}
			else if ($restaurantId ==5) {echo "(312)326-6888";}?>
			<br><?php echo "Hi " ?>{{ Auth::user()->username }}<br>
		</div>
			<div id="balance">
				Your Current Balance: <?php echo "$ ".$balance; ?>
			</div>
		<div id="timer" ></div>
	</div>
</div>
<div class="col-md-9 col-xs-12">
		<img src="images/
		<?php 
				if ($restaurantId==1) {echo "right_top.jpg";}
				else if ($restaurantId ==2) {echo "Homestyle Taste right top.jpg";}
				else if ($restaurantId ==3) {echo "Sze Chuang Cuisine right top.jpg";}
				else if ($restaurantId ==4) {echo "Go4Food right top.jpg";}
				else if ($restaurantId ==5) {echo "Cai right top.jpg";}
		?>" width="100%;" height="100px" />
	</div>
	

<div class="col-md-12" id="fudong"  style="position:absolute;top:00px;width:250px; background: #A8F38B;text-align: center; margin-left:5px;z-index: 2;">
	<a href="analysis.php" target="_blank" style="color:black;">Have no idea what to choose?<br>Click here! <br>(username:viewer password:123456)</a>
	<!-- mibew button --><a id="mibew-agent-button" href="/mibew/chat?locale=en" target="_blank" onclick="Mibew.Objects.ChatPopups['570607c7e308acfb'].open();return false;"><img src="/mibew/b?i=mgreen&amp;lang=en" border="0" alt="" /></a><script type="text/javascript" src="/mibew/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"570607c7e308acfb","url":"\/mibew\/chat?locale=en","preferIFrame":true,"modSecurity":false,"width":640,"height":480,"resizable":true,"styleLoader":"\/mibew\/chat\/style\/popup"});</script><!-- / mibew button -->
</div>


<script type="text/javascript">
refreshStaticMenu("fudong",800);
function getScroll() {
   var t, l, w, h;
   if (document.documentElement && document.documentElement.scrollTop) {
    t = document.documentElement.scrollTop;
   }
   else if (document.body) {
    t = document.body.scrollTop;
   }
    return t;
}
function refreshStaticMenu(id,stmnGAP2)
{
 var stmnGAP1 = 700;
 if(!stmnGAP2){
          stmnGAP2=200;
      }
 var stmnBASE = 0;
 var stmnActivateSpeed =200;
 var stmnScrollSpeed =10;
 var stmnTimer;
 var qqdiv=document.getElementById(id);
 var stmnStartPoint, stmnEndPoint, stmnRefreshTimer;
   stmnStartPoint = parseInt(qqdiv.style.top, 10);
   stmnEndPoint = getScroll() + stmnGAP2;
   if (stmnEndPoint < stmnGAP1)
   stmnEndPoint = stmnGAP1;
   stmnRefreshTimer = stmnActivateSpeed;
   if ( stmnStartPoint != stmnEndPoint ){
                   stmnScrollAmount = Math.ceil( Math.abs( stmnEndPoint - stmnStartPoint ) / 15 );
                   qqdiv.style.top = parseInt(qqdiv.style.top, 10) + ( ( stmnEndPoint < stmnStartPoint ) ? -stmnScrollAmount : stmnScrollAmount )+"px";
                   stmnRefreshTimer = stmnScrollSpeed;
   }
   stmnTimer = setTimeout ("refreshStaticMenu('"+id+"',"+stmnGAP2+");",stmnRefreshTimer);
}
</script>





<?php
	/*	if(isset($_GET['link'])){
			$link=$_GET['link'];
			if ($link == 1){
				echo '<script language="javascript">alert("Coming soon...");</script>';
				echo '<script language="javascript">location.replace("show.php");</script>';
			}
		}
		*/
		if($balance < -10){
			echo '<script language="javascript">alert("Please pay attention to your balance. You will not be allowed to order lunch when it comes to $-20.");</script>';
		}
	?>
	
	


	

	

<div class="col-md-9 col-xs-12 column">
	<div class="cnt">
		<marquee style="font-size:21px; color:#0000FF; direction:left;">
			<img src="images/tp009.gif" width=15> Welcome to use lunch reservation system. Today's restaurant is <mark><?php 
				if ($restaurantId==1) {echo "Northern City";}
				else if ($restaurantId ==2) {echo "Homestyle Taste";}
				else if ($restaurantId ==3) {echo "Sze Chuan Cuisine";}
				else if ($restaurantId ==4) {echo "Go4Food";}
				else if ($restaurantId ==5) {echo "Cai";}
			?></mark>. Enjoy your lunch!
		</marquee>
	</div>

	<div class="pic4" style=""></div>
	<div class="pic4" style=""></div>
	<div class="pic4" style=""></div>
	<div class="pic4" style=""></div>
	<div class="regist" style="text-align:center" >
		<div style="font-size:22px; ">Attention: The image shown here is indicative only. The actual product may differ.</div>
	</div>


	<div class="col-md-12" style="margin-top: 5px;">
		  
		<div class= "table-responsive">
			<table border="0" width="100%;" style="text-align:left;">
			<?php
				$count=0;
				foreach($foods as $food){
					$count++;
			?>
			<?php 
				if($count%4==1){
			?>
					<tr>
			<?php } ?>

               <td>
			   <form class="form-horizontal" role="form" method="post" action="order">
                        {{ csrf_field() }}
			    <table border="0" width="98%"  height="145" cellpadding="0" cellspacing="0" style="margin: 5px;">
                 <tr>
                  <td width="40%" rowspan="4"><img src="images/{{ $food->imageurl }}" width="90%" height="130" style="float:right;"/></td> 
                   <td width="60%" style="font-size:18px;"><strong>&nbsp;{{ $food->name }}</strong></td>
                 </tr>
				 <tr>
                   <td style="font-size:18px;">&nbsp;{{ $food->englishname }}</td>
                 </tr>
                 <tr>
                   <td style="font-size:20px;">&nbsp;Price: <font color="#FF0000">{{ $food->price }}</font></td>
                 </tr>
                 <tr>
                   <td style="font-size:20px;">&nbsp;<input type = 'submit' style="color:#000000;" value='Choose' name='order'>
						
				   </td>
                 </tr><tr></tr>  <input type="hidden" name="order" id="order" value="{{ $food->id}}">
                </table></form>
			   </td>
			   <?php 
			     if($count%4==0){
			   ?>
             </tr>
			 <?php }?>
             <?php
			   }
			 ?>
			 
			
          </table>
		  <div class="col-md-7 col-md-offset-5">{{ $foods->links() }}</div>
		</div>
		
		</div>


   </div>

@endsection
