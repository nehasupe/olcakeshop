<?php
 include "db.php";
 
 session_start();
 include "navigationbar.php";
 if($_SESSION['logged_in'])
  {
   $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
else
{
  echo '<script>alert("login to continue shopping")</script>';
  header ("location: index.php");
}
 
          
 ?>  

<!DOCTYPE html>
<html>
<head>
  <title>cart</title>
  <title>Shopping Cart</title>
          <link rel="icon" type="image/ico" href="../images/favicon.ico" >
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
 <div class="paddings" style="background: url('../images/flagsandcups.jpg'); background-size: cover; ">      
<div style="padding-top: 200px;">
<h2 align="center">Shopping Cart</h2><br />
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                            
                            <?php  
                            $query = "SELECT * FROM orders where user_id= '$user_id' ";  
                            $result = mysqli_query($connect, $query);

                            if(mysqli_num_rows($result)>0)  
                            
                            {  
                                  $total=0;
                                 while($row = mysqli_fetch_array($result))  
                                 {  

                ?>            <form method="post" action="cart.php?action=add&id=<?php echo $row["product_name"]; ?>">  
                                   
                          <tr>   
				
                               

                              <td><h4 class="text-info"><?php echo $row["product_name"]; ?></h4> 
                                 <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />  </td>
                             <td> <h4 class="text-danger"><?php echo $row["product_quantity"]; ?></h4> 
                             <input type="hidden" name="hidden_quantity" value="<?php echo $row["product_quantity"]; ?>" />  </td>
                             <td><h4 class="text-info"><?php echo $row["product_price"]; ?></h4>  
                             <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />  </td>
                             <td><h4 class="text-info"><?php echo number_format($row["product_quantity"] * $row["product_price"], 2); ?></h4></td>  
                               
                             <td>  <input type="submit" name="delete" style="margin-top:5px;" class="btn btn-danger" value="delete" />  </td>
<?php
if(isset($_POST["delete"]))
  {
        $sql = "DELETE FROM orders where user_id= '$user_id' AND product_quantity='".$_POST['hidden_quantity']."' AND product_name='".$_POST['hidden_name']."'";  
                            
              if(mysqli_query($connect, $sql))
              {
              header ("location: cart.php");
              }

}

?>
							 
  
							   
                          </tr> 
                          </form> 
                          <?php  
                                    $total = $total + ($row["product_quantity"] * $row["product_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right"><h4 class="text-info"><?php echo number_format($total, 2); ?></h4></td>  
                               <td><button name="check_out" class="btn1" action="check_out">Check out</td>  </button>
                          </tr>  
                          <?php  
                          }  
                          else
                          {
                           ?>  
                           <h4>YOUR CART IS EMPTY</h4>
                           <?php 
                         }
                         ?>

                     </table>  
                </div>  
                </div>
                <?php include "footer.php";?>
</body>
</html>
