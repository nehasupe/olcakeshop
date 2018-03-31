<?php

$email = $connect->escape_string($_POST['email']);
$result = $connect->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo '<script>alert("wrong email")</script>';
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['user_id']= $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['logged_in'] = true;

        header("location: index1.php");
    }
    else {
        echo '<script>alert("wrong password")</script>';
 
    }
}

