<?php
include 'config.php';

if(isset($_POST['submit'])){

       
        $file_name=$_FILES['product_image']['name'];
        $file_tmp=$_FILES['product_image']['tmp_name'];
        $file_size=$_FILES['product_image']['size'];
        $file_type=$_FILES['product_image']['type'];

        $news_title= $_POST['product_title'];
        $news_contain= $_POST['product_contain'];
        $news_category= $_POST['product_color'];
        $news_price= $_POST['product_price'];
        $product_Category =$_POST['Product_category'];
        if($file_size >  6458435){
            echo "<h1>Image size too large!!!</h1>";
        }else{
    
           $upload=move_uploaded_file($file_tmp,"images/".$file_name);
           if($upload){
            $sql="INSERT INTO product(title,category_id,dis,price,color,image) VALUES('$news_title','$product_Category','$news_contain','$news_price','$news_category','$file_name')";
              mysqli_query($conn,$sql);
              header("location:dashboard.php");
    
           }
        }
       
       }
?>
