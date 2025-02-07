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
    <link rel="stylesheet" href="../css/home.css?v= 55">
    <link rel="stylesheet" href="../css/post.css">
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
                    <div class="post">
                        <h2>View the Details</h2>
                    </div>
                    <?php 
                    include "config.php";
                    if(isset($_GET['id'])){
                    $id = $_GET['id'] ;
                    $sql= "SELECT * FROM product WHERE id ='$id'";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){
                      
                      ?>
                    <form action="action_post.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <div class="news-title">
                            <label for="newstitle">Product Title:</label>
                            <input type="text" name="product_title" value="<?php echo $row['title'];?> " readonly>
                        </div>
                        <div class="news-contain">
                            <label for="newscontain">Product Details:</label>
                            <textarea name="product_contain" id="" cols="10" rows="20" readonly>value="<?php echo $row['dis'];?> "</textarea>
                        </div>
                        <div class="news-image">
                            <label for="newsimage">Product image:</label>
                            <img src="images/<?php echo $row['image'];?>" alt="img" width="320px" height="300px" readonly>
                        </div>
                        <div class="news-price">
                            <label for="newsimage">Product Price:</label>
                            <input type="text" name="product_price" value="<?php echo $row['price'];?> " readonly>
                        </div>
                        <div class="news-categories">
                            <label for="newscategories">Select Color:</label>
                            <select name="product_category" id="" readonly>
                                <option value="BLack" <?php if ($row['color'] == 'Black') echo 'selected'; ?>>Black</option>
                                <option value="Bulue"<?php if ($row['color'] == 'Bulue') echo 'selected'; ?>>Bulue</option>
                                <option value="Red"<?php if ($row['color'] == 'Red') echo 'selected'; ?>>Red</option>
                                <option value="Light"<?php if ($row['color'] == 'Light') echo 'selected'; ?>>Light</option>
                                <option value="Dark"<?php if ($row['color'] == 'Dark') echo 'selected'; ?>>Dark</option>
                            </select>
                        </div>
                        <div class="news-post">
                            <input type="submit" name="submit" value="POST">
                        </div>
                    </form>
                    <?php
                    }
                }
            }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>