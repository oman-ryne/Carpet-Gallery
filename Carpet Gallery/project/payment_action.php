<?php
session_start();
include('admin/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['oname'];
    $phone = $_POST['ophone'];
    $email = $_POST['oemail'];
    $address = $_POST['oaddress'];

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "User not logged in.";
        exit();
    }

    // Processing cart data
    if (!empty($_SESSION['cart'])) {
        $total = 0;
        $productNames = [];

        foreach ($_SESSION['cart'] as $item) {
            $productNames[] = $item['p_name'];
            $total += $item['p_price'];
        }

        $productList = implode(", ", $productNames);

        // Insert order into the database
        $query = "INSERT INTO P_order (name, phone, email, address, pname, totalam, username)
                  VALUES ('$name', '$phone', '$email', '$address', '$productList', '$total', '$username')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Order placed successfully!'); window.location='index.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Cart is empty.";
    }
}
?>
