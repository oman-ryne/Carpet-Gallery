<?php
include "nav.php";
?>
<style>
    /* Move styles to an external CSS file for better organization */
    .main-container {
        width: 70%;
        margin-left: 25%;
        margin-top: -50%; /* Adjust margin top */
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 20px;
    }

    .main-container .container {
        width: 100%;
        display:flex;
    }

    .main-container .container .small-container {
        width: 200px; /* Increase container width for better spacing */
        height: 150px; /* Increase container height for better visibility */
        text-align: center;
        background-color: #f3f3f3; /* Lighter background color */
        border-radius: 10px; /* Add border radius for rounded corners */
        padding: 20px; /* Increase padding for better spacing */
        margin-top:50px;
        margin-right:30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    }

    .small-container i {
        font-size: 48px; /* Increase icon size */
        margin-bottom: 20px; /* Increase margin bottom for better spacing */
        color: #4CAF50; /* Green color for consistency */
    }

    .small-container h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px; /* Increase margin bottom for better spacing */
    }

    .small-container span {
        font-size: 36px; /* Increase font size for count */
    }
    .small-container a{
        text-decoration:none;
        color: #000;
        font-size:20px;
        padding-bottom:20px;
    }
    .small-container a:hover{
        cursor: pointer;
        color:red;
    }
</style>
<div class="main-container">
    <div class="container">
    <?php
include "config.php";
$sql = "SELECT COUNT(*) AS product_count FROM product";
$result_product = mysqli_query($conn, $sql);

$sql = "SELECT COUNT(*) AS order_count FROM `p_order`"; // order is a reserved keyword, so it should be enclosed in backticks
$result_order = mysqli_query($conn, $sql);

$sql = "SELECT COUNT(*) AS user_count FROM user";
$result_user = mysqli_query($conn, $sql);

$product_count = 0;
$order_count = 0;
$user_count = 0;

if ($result_product && $result_order && $result_user) {
    $row_product = mysqli_fetch_assoc($result_product);
    $product_count = $row_product['product_count'];

    $row_order = mysqli_fetch_assoc($result_order);
    $order_count = $row_order['order_count'];

    $row_user = mysqli_fetch_assoc($result_user);
    $user_count = $row_user['user_count'];
}
?>
<h2>DashBoard</h2>
<div class="small-container">
    <i class="fas fa-box"> <span><?php echo $product_count; ?></span></i>
    <h2>Products</h2>
    <a href="product.php">See More</a> <!-- Fixed the closing tag for anchor -->
</div>
<div class="small-container">
    <i class="fas fa-shopping-cart"> <span><?php echo $order_count; ?></span></i>
    <h2>Orders</h2>
    <a href="order.php">See More</a> <!-- Fixed the closing tag for anchor -->
</div>
<div class="small-container">
    <i class="far fa-user"> <span><?php echo $user_count; ?></span></i>
    <h2>User</h2>
    <a href="user.php">See More</a> <!-- Fixed the closing tag for anchor -->
</div>

    </div>
</div>
<?php
include "Footer.php";
?>
