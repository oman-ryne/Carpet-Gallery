<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection
include 'admin/config.php';

// Fetch user details from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE email = '$username'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
global $user;
$user=mysqli_fetch_assoc($result);
}

//Fetch user orders from the database
$sql_orders = "SELECT * FROM p_order WHERE username = '$username'";
$result1 = mysqli_query($conn,$sql_orders);
if(mysqli_num_rows($result1)>0){    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        .order-table th, .order-table td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">User Profile</h1>
        <div class="profile-header">
            <img src="user-image/<?php echo htmlspecialchars($user['pro_image']);?>" alt="Profile Photo" class="profile-photo">
            <div>
                <h2><?php echo htmlspecialchars($user['name']); ?></h2>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Address: <?php echo htmlspecialchars($user['address']); ?></p>
                <p>Contact: <?php echo htmlspecialchars($user['phone']); ?></p>
            </div>
        </div>
        <h3 class="my-4">Order History</h3>
        <table class="table table-bordered order-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 while ($order = $result1->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['pname']); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td><?php echo htmlspecialchars($order['p_status']); ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


