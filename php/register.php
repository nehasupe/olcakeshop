<?php

$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];


$first_name = $connect->escape_string($_POST['firstname']);
$last_name = $connect->escape_string($_POST['lastname']);
$email = $connect->escape_string($_POST['email']);
$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $connect->escape_string( md5( rand(0,1000) ) );
      

$result = $connect->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

if ( $result->num_rows > 0 ) 
{
    
    echo '<script>alert("user already exists")</script>';
    
}
else 
{ 

    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";


    if ( $connect->query($sql) ){
echo '<script>alert("you have been registered
login to continue")</script>';
       

       

    }

    else {
        echo '<script>alert("registration failed")</script>';
    }

}

?>