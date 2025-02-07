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
    <link rel="stylesheet" href="../css/home.css?v=34">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="nav-bar">
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
                <h2>Order Record</h2>
                <table border="1">
                 <thead>
                  <th>Name</th>
                  <th>Prodrout Name</th>
                  <th>Contact Number</th>
                  <th>Amount</th>
                  <th>Status</th>
                  </thead>
                  <tbody>
                    <?php 
                    include "config.php";

                    $sql= "SELECT * FROM P_order";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){

                      ?>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['pname'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['totalam'];?></td>
                    <td><a href="function.php?c_id=<?php echo $row['id'];?>" class="btn-link">Deliver</a></td>
                </tbody>
                <?php
                     }
                 }
                  ?>
                </table>
               </div>
            </div>
        </div>
    </div>
</body>
</html>