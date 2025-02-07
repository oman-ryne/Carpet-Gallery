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
    <link rel="stylesheet" href="../css/home.css?v= 57">
    <link rel="stylesheet" href="../css/post.css?v= 23">
</head>
<style>
    /* Basic form styles */
    form {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    img {
        display: block;
        margin-top: 10px;
        max-width: 100%;
        height: auto;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

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
                        <h2>Upload the Details</h2>
                    </div>
                    <h2>Add Feature Image</h2>
                    <button id="show-add-FeatureImage-form-btn">Add Feature Image</button>
                    <form id="add-FeatureImage-form" action="function.php" method="post" enctype="multipart/form-data">
                        <!-- Your form fields for adding a new category -->
                        <input type="text" name="image_name" placeholder="Name Of Feature Image"><br>
                        <label for="image">Image</label>
                        <input type="file" name="image">
                        <input type="submit" name="submit_featureImage" value="Submit">
                    </form>
                    <form action="action_post.php" method="post" enctype="multipart/form-data">
                        <div class="news-title">
                            <label for="newstitle">Product Title:</label>
                            <input type="text" name="product_title">
                        </div>
                        <div class="news-contain">
                            <label for="newscontain">Product Details:</label>
                            <textarea name="product_contain" id="" cols="10" rows="20"></textarea>
                        </div>
                        <div class="news-image">
                            <label for="newsimage">Product image:</label>
                            <input type="file" name="product_image">
                        </div>
                        <div class="news-price">
                            <label for="newsimage">Product Price:</label>
                            <input type="text" name="product_price">
                        </div>
                        <div class="product-catrgories">
                            <label>Category:</label>
                            <select name="Product_category">
                                <?php
                       include "config.php";
            $sql = "SELECT * FROM p_category";
            $result = $conn->query($sql);

            // Output options for categories
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["c_id"] . "'>" . $row["c_name"] . "</option>";
                }
            } else {
                echo "No categories found";
            }

         
            ?>
                            </select>
                        </div>
                        <div class="news-categories">
                            <label for="newscategories">Select Color:</label>
                            <select name="product_color" id="">
                                <option value="BLack">Black</option>
                                <option value="Bulue">Bulue</option>
                                <option value="Red">Red</option>
                                <option value="Light">Light</option>
                                <option value="Dark">Dark</option>
                            </select>
                        </div>
                        <div class="news-post">
                            <input type="submit" name="submit" value="POST">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('show-add-FeatureImage-form-btn').addEventListener('click', function() {
        var addCategoryForm = document.getElementById('add-FeatureImage-form');
        if (addCategoryForm.style.display === 'none') {
            addCategoryForm.style.display = 'block';
        } else {
            addCategoryForm.style.display = 'none';
        }
    });
</script>
</body>

</html>