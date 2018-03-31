<?php   
 
include "db.php";
session_start();  
include "navigationbar.php";

if(!isset($_SESSION['logged_in']))
{
  $_SESSION['logged_in']=0;
}

if ( $_SESSION['logged_in'] != 1 ) {
 
 $_SESSION['first_name']="Guest";
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

// $logg =$_SESSION['logged_in'];
if(isset($_POST["add_to_cart"]))  
 {  
  if($_SESSION['logged_in']==1)
  {
      $sql = "INSERT INTO orders (user_id, user_first_name, user_last_name, product_id, product_name, product_quantity, product_price) VALUES ('".$_SESSION['user_id']."','".$_SESSION['first_name']."','".$_SESSION['last_name']."','".$_POST['hidden_id']."','".$_POST['hidden_name']."','".$_POST['quantity']."','".$_POST['hidden_price']."')";
      if (mysqli_query($connect, $sql)) {
   
} else {
    echo '<script>alert("login to continue shopping")</script>';
}

  }
  else 
  {
    echo '<script>alert("login to continue shopping")</script>';
  }



}
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Shopping Cart</title>  
           <link rel="icon" type="image/ico" href="../images/favicon.ico" >
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           
           <link rel="stylesheet" type="text/css" href="../css/shop.css"> 
 
</head>
<body>
<div class="padding">
<div class="tab">
  <button onclick="myFunction('myDIV1')">cupcakes</button>
<button onclick="myFunction('myDIV2')">cakes</button>
<button onclick="myFunction('myDIV3')">bakery goods</button>
</div>


<div id="myDIV1" class="tabcontent">
  <h4>CUPCAKES</h4>
  <div class="container" style="max-width: 700px;">
  <?php  
                $query = "SELECT * FROM cupcakes ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0)  
                {  

                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="index1.php?action=add&id=<?php echo $row["id"]; ?>">  
                         <div class="product">
                         
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />   
                               <img src="../<?php echo $row["image"]; ?>" style="height:150px; width: 100px;" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                               
                               <input type="submit" name="add_to_cart" style="margin-top: 15px;" class="button1" value="Add to Cart" />  

                           </div>
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                </div>
                
</div>

<div id="myDIV2" class="tabcontent">
  <h4>CAKES</h4>
  <div class="container" style="max-width: 700px;">
  <?php  
                $query = "SELECT * FROM cakes ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0)  
                {  

                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="index1.php?action=add&id=<?php echo $row["id"]; ?>">  
                         <div class="product">
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />   
                               <img src="../<?php echo $row["image"]; ?>" id="logo3" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top: 15px;" class="button1" value="Add to Cart" />  

                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                
</div>
</div>

<div id="myDIV3" class="tabcontent">
  <h4>BAKERY GOODS</h4>
  <div class="container" style="max-width: 700px;">
  <?php  
                $query = "SELECT * FROM bakery ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0)  
                {  

                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="index1.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div class="product">
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />   
                               <img src="../<?php echo $row["image"]; ?>" id="logo3" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top: 15px;" class="button1" value="Add to Cart" />  

                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                
</div>
</div>



 <script>
function myFunction(name) {
  if(name=="myDIV2")
  {document.getElementById(name).style.display = "block";
document.getElementById("myDIV1").style.display = "none";
  document.getElementById("myDIV3").style.display = "none";}
else if(name=="myDIV1")
  {document.getElementById(name).style.display = "block";
document.getElementById("myDIV2").style.display = "none";
  document.getElementById("myDIV3").style.display = "none";}
else if(name=="myDIV3")
  {document.getElementById(name).style.display = "block";
document.getElementById("myDIV2").style.display = "none";
  document.getElementById("myDIV1").style.display = "none";}
 
}

</script>
<?php include "footer.php"; ?> 
</body>
</html> 
