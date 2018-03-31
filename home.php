<?php
 
include "db.php";
session_start();  

if(!isset($_SESSION['logged_in']))
{
  $_SESSION['logged_in']=0;
}
if ( $_SESSION['logged_in'] != 1 ) {
  
 $_SESSION['first_name']="Guest";
}
else {
    
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<head>
	<title>The Confectionery house</title>
	<link rel="icon" type="image/ico" href="images/favicon.ico" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link href="css/animate.css" rel="stylesheet"/>
	<link href="css/waypoints.css" rel="stylesheet"/>
	<script src="js/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="js/waypoints.js" type="text/javascript"></script>
	<script src="js/navshrink.js" type="text/javascript"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://use.fontawesome.com/723705b3ad.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-viewport-checker/1.8.8/jquery.viewportchecker.min.js"></script>
	<script src="js/homepage.js" type="text/javascript"></script>
	
</head>
<body> 
	<nav>
		<ul>
			<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
			<li><a href="#home"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
			<li> <a href="php/index1.php" align=""><i class="fa fa-caret-down"></i> Shop Online </a></li>
			<?php
				if($_SESSION['logged_in']==1)
				{ 
			?>
			<li><a href="php/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping cart</a></li>
			<li><a href="php/logout.php" class="btn1"> logout</a></li>

            <?php
            }
            else
            {
			?>
            <li><a href="php/index.php" class="btn1"> login/Sign Up</a></li>
            <?php
          }
          ?>

 </ul>
 </nav>

<section class="intro" >

	<div class="inner post">
		<div class="content">
		<table><tr>
			<td><section class="os-animation" data-os-animation="bounceInLeft" data-os-animation-delay="2s">
			<img src="images/logo5.png" id="logo" align="left" >
			</section></td>
			<td>
			<section class="os-animation" data-os-animation="bounceInUp" data-os-animation-delay="2s">
			<h1>The Confectionery House</h1>
			</section></td></tr>
			<tr><td colspan="2"><section class="os-animation" data-os-animation="bounceInUp" data-os-animation-delay="3s">
			<a class="btn" href="php/index1.php">Shop Now</a></section></td></tr>
			</table>
		</div>
		
</div>
</section>

	<div class="intro-image-1 post">
	<div class="content1 post1">

	<h3>About US</h3>
	<p>  1997, Ketki Supe purchased The Confectionery House Bakery, which operated on 86th St. in the Bay Ridge section of Thane. By enlisting the help of her sister, Erica, the business began to grow exponentially. The Confectionery House now supplies fresh baked goods to some of the best known retailers in Mumbai and Thane areas.

Today, Erica continues the family legacy as president of the company. Over the years, The Confectionery House has expanded from Italian bread to many other varieties including Kaiser Rolls, 3 to 6 foot heroes, as well as a variety of cookies. We have recently opened a retail shop on site. You can now purchase fresh baked products at our newly opened bakery shoppe.</p>
	
	</div>
	</div>
	<div class="intro-image-2 post" >
	<div class="content1 post1">
	<h3>Our Services</h3>
	<p> We offer custom cakes for all occasions, whether you’re looking for a beautiful tiered wedding cake, sheet cake for a birthday party or a custom cake design, our Cake Salon team can work with you to create a deliciously decorated cake for your occasion. We also keep cupcakes and bakery goods.</p>
	</div>
	</div>
	<div class="intro-image-3 post">
	<div class="content2 post1">
	<h3>Ingredients</h3>
	<p> We use fresh and organic ingredients. We also make gluten free products on order.</p>
	</div>
	</div>
<div id="animate-area">
	
	<img src="images/deliveryvan.png" class="logo1 post1">
	
	</div> 


<footer>

	<table class="tableclass">
	<tr><td>Address:<br>
	B-wing, Ganraj Heights,<br>
	Kolbad,Thane-west</td><br>
	<td> Follow us on:
	<br> <a href="#" ><i class="fa fa-instagram" aria-hidden="true"></i> instagram</a>
	<br> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook </a>
	<br>like and share
	</td></tr>
	<tr>
	<td colspan="2"><a href="home.php"> home</a>
	<a href="php/cart.php">cart</a>
	<a href="php/index1.php">shop online</a>
	<a href="#">help</a>
	</td>
	</tr>
	</table>
	
</footer>
</body>
</html>