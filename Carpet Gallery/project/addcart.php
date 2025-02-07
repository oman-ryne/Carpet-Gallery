<?php
session_start();

// Add items to cart
if (isset($_POST['cart_id']) && $_POST['action'] == 'add') {
    $outputTable = '';
    if (isset($_SESSION['cart'])) {
        $isalreadyExist = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($_SESSION['cart'][$key]['p_id'] == $_POST['cart_id']) {
                $isalreadyExist++;
                // If item exists, update the quantity (optional)
                $_SESSION['cart'][$key]['p_quantity'] += 1; // Increment quantity by 1
            }
        }
        if ($isalreadyExist < 1) {
            // Add new item to cart
            $itemArray = array(
                'p_id' => $_POST['cart_id'],
                'p_name' => $_POST['cart_name'],
                'p_price' => $_POST['cart_price'],
                'p_quantity' => 1  // Initialize quantity to 1
            );
            $_SESSION['cart'][] = $itemArray;
        }

    } else {
        // Initialize cart with first item
        $itemArray = array(
            'p_id' => $_POST['cart_id'],
            'p_name' => $_POST['cart_name'],
            'p_price' => $_POST['cart_price'],
            'p_quantity' => 1  // Initialize quantity to 1
        );
        $_SESSION['cart'][] = $itemArray;
    }
}

// Remove items from cart
if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $val) {
        if ($val['p_id'] == $_POST['id_to_remove']) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

// Calculate and display the cart items and total
if (!empty($_SESSION['cart'])) {
    $outputTable = '';
    $total = 0;
    $outputTable .= "<table class='table table-bordered'><thead><tr><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
    foreach ($_SESSION['cart'] as $key => $value) {
        $outputTable .= "<tr><td>".$value['p_name']."</td><td>".$value['p_price']."</td><td>".$value['p_quantity']."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Delete</button></td></tr>";
        $total += ($value['p_price'] * $value['p_quantity']); // Total price calculation based on quantity
    }
    $outputTable .= "</table>";
    $outputTable .= "<div class='text-center'><b>Total: ".$total."</b></div>";
    $_SESSION['cart_table'] = $outputTable;
    $_SESSION['cart_total'] = $total; // Store the total amount in session for payment page
}

echo json_encode($outputTable);
?>
