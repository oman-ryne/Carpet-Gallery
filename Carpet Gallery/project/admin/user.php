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
                <h2>User Record</h2>
                <button id="show-add-user-form-btn">Add User</button>
               <form id="add-user-form" action="function.php" method="post">
            <!-- Your form fields for adding a new category -->
               <input type="text" name="user_name" placeholder="User Name">
               <input type="text" name="user_password" placeholder="Password">
               <select name="user_role" required>
                 <option value="" disabled selected name ="user_role">Select User Role</option>
                 <option value="admin">Admin</option>
                 <option value="editor">Editor</option>
                 <option value="viewer">Viewer</option>
              </select>
              <input type="submit" name= "submit_user" value="Submit">
              </form>
                <table border="1">
                 <thead>
                  <th>User Name</th>
                  <th>User Role</th>
                  <th>Password</th>
                  <th>Action</th>
                  </thead>
                  <tbody>
                    <?php 
                    include "config.php";

                    $sql= "SELECT * FROM admin";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){

                      ?>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><button><a href="function.php?id=<?php echo $row['u_id'];?>">Delete </a></button></td>
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
    <script>
    document.getElementById('show-add-user-form-btn').addEventListener('click', function() {
        var addCategoryForm = document.getElementById('add-user-form');
        if (addCategoryForm.style.display === 'none') {
            addCategoryForm.style.display = 'block';
        } else {
            addCategoryForm.style.display = 'none';
        }
    });
</script>
</body>
</html>