<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarpetGallery</title>
     <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../css/home.css?v=29">
</head>
<body>
    <div class="container">
        <div class="row">
                <div class="top-nav-bar">
                    <h1>CarpetGallery</h1>
                    <img src="" alt="">
                </div>
                <div class="main-nav-bar">
                <ul>
                    <li><a href="dashboard.php">DashBoard</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="post.php">Add Product</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="feedback.php">FeedBack</a></li>
                    <li><a href="user.php">Users</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
               </div>
               <div class="main-contain">
                <h2>Product Record</h2>
                <table border="1">
                 <thead>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Action</th>
                  </thead>
                  <tbody>
                    <?php 
                    include "config.php";

                    $sql= "SELECT * FROM product";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){

                      ?>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><button><a href="view.php?id=<?php echo $row['id'];?>">View </a></button> <button><a href="edit.php?id=<?php echo $row['id'];?>">Update </a></button> <button><a href="delete.php?id=<?php echo $row['id'];?>">Delete </a></button></td>
              
                </tbody>
                <?php
                     }
                 }
                  ?>
                </table>
               </div>
        </div>
    </div>
</body>
</html>