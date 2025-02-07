<?php
session_start();
include "config.php";

function validateUser($username, $password){
    global $conn;
    $query = "SELECT * FROM admin WHERE username ='$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        return true;
        
    } else {
        return false;
    }
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(validateUser($username,  $password)){
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
        exit;
    } else {
        header("location: signin.php?error=password and username want to wrong");
        exit;
    }
}
?>
