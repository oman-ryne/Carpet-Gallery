<?php
  include "config.php";
  if(isset($_GET['id'])){
  $id = $_GET['id'] ;
  $sql= "DELETE  FROM product WHERE id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:home.php");
  }
}
?>