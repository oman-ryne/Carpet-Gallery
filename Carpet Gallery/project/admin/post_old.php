<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bisho sanchar</title>
    <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/post.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="nav-bar">
                <div class="top-nav-bar">
                    <h1>Bisho sanchar</h1>
                    <img src="" alt="">
                </div>
                <div class="main-nav-bar">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="post.php">Add POST</a></li>
                        <li><a href="#">Comments</a></li>
                        <li><a href="#">Users</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <div class="main-contain">
                    <div class="post">
                        <h2>Upload the Details</h2>
                    </div>
                    <form action="action_post.php" method="post" enctype="multipart/form-data">
                        <div class="news-title">
                            <label for="newstitle">Product Title:</label>
                            <input type="text" name="product_title">
                        </div>
                        <div class="news-contain">
                            <label for="newscontain">Product Details:</label>
                            <textarea name="product_contain" id="" cols="10" rows="50"></textarea>
                        </div>
                        <div class="news-image">
                            <label for="newsimage">Product image:</label>
                            <input type="file" name="product_image">
                        </div>
                        <div class="news-price">
                            <label for="newsimage">Product Price:</label>
                            <input type="text" name="product_price">
                        </div>
                        <div class="news-categories">
                            <label for="newscategories">Select Color:</label>
                            <select name="product_category" id="">
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
</body>

</html>