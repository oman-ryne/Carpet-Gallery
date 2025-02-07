<?php
include 'config.php';



if(isset($_POST['submit'])){

       $id = $_POST['id'];

        $file_name=$_FILES['product_image']['name'];
        $file_tmp=$_FILES['product_image']['tmp_name'];
        $file_size=$_FILES['product_image']['size'];
        $file_type=$_FILES['product_image']['type'];

        $news_title= $_POST['product_title'];
        $news_contain= $_POST['product_contain'];
        $news_category= $_POST['product_color'];
        $news_price= $_POST['product_price'];
        $product_category= $_POST['Product_category'];

        if($file_size >  6458435){
            echo "<h1>Image size too large!!!</h1>";
        }else{
           //$sql="INSERT( INTO image(image) VALUES($$file_name)";
           //mysqli_query($db_conn,$sql);
    
           $upload=move_uploaded_file($file_tmp,"images/".$file_name);
           if($upload){
            $sql = "UPDATE product SET title='$news_title',category_id = '$product_category', dis='$news_contain', price='$news_price', color='$news_category', image='$file_name' WHERE id=$id";
              mysqli_query($conn,$sql);
              header("location:dashboard.php");
    
           }else{
            echo "file too large!!";
           }

        }
       
    }
    
?>
