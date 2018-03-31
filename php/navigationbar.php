<?php
if(!isset($_SESSION['logged_in']))
{
  $_SESSION['logged_in']=0;
}

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
 $_SESSION['first_name']="Guest";
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="icon" type="image/ico" href="../../images/favicon.ico" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="../css/navigationbar.css">
		   <script src="https://use.fontawesome.com/723705b3ad.js"></script>
</head>
<body>
<div class="navigation">
        <ul>
          <li><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> 
      <?php
         
              echo "Hi ".$_SESSION["first_name"]."" ;
              ?>
        
              </a></li>
          <li><a href="../home.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Home</a></li>
      <li><a href="index1.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Shop Online</a></li>
          
      
              <?php if($_SESSION['logged_in']==1)

{             ?> <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> shopping cart</a></li>
<li><a href="logout.php" class="btn1"> logout</a></li>

              </ul>
              <?php
            }
            else
            {


            ?>
            <li><a href="index.php" class="btn1"> login</a></li>
            <?php
          }
          ?>
      </div>
</body>
</html>




