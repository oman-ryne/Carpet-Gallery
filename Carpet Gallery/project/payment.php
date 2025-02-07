<?php
session_start();
// Assuming $cart_total is stored in session or calculated from cart items
if (isset($_SESSION['cart'])) {
    $cart_total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $cart_total += $item['p_price']; // Adjust as needed for quantity and price
    }
} else {
    $cart_total = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarpetGallery - Payment Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            background-color: green;
            padding: 20px 0;
            text-align: center;
            color: #ffffff;
        }

        .main-contain {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: green;
            font-style: italic;
            font-weight: 200;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: green;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }

        .hidden {
            display: none;
        }

        .payment-option {
            margin: 20px 0;
        }

        .payment-option input {
            margin-right: 10px;
        }

        .payment-option label {
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Page</h1>
    </div>

    <div class="main-contain">
        <h1>Choose Your Payment Option</h1>

        <!-- Payment Options -->
        <div class="payment-option">
            <input type="radio" id="showForm1" name="showForm" value="form1">
            <label for="showForm1">Cash on Delivery</label>

            <input type="radio" id="showForm2" name="showForm" value="form2">
            <label for="showForm2">E-sewa</label>
        </div>

        <!-- Cash on Delivery Form -->
        <form id="form1" class="hidden" action="payment_action.php" method="post">
            <h3>Cash on Delivery</h3>
            <label for="oname">Full Name</label>
            <input type="text" name="oname" id="oname" required>

            <label for="ophone">Phone Number</label>
            <input type="text" name="ophone" id="ophone" required>

            <label for="oemail">E-mail</label>
            <input type="email" name="oemail" id="oemail" required>

            <label for="oaddress">Address</label>
            <input type="text" name="oaddress" id="oaddress" required>

            <input type="submit" value="Submit" name="submit">
        </form>

        <!-- E-sewa Payment Form -->
        <form id="form2" class="hidden" action="https://uat.esewa.com.np/epay/main" method="POST">
            <h3>E-sewa Payment</h3>
            <label for="amount">Total Amount: </label>
            <input type="text" id="amount" name="amt" value="<?php echo $cart_total; ?>" readonly>

            <input type="hidden" name="tAmt" value="<?php echo $cart_total; ?>">
            <input type="hidden" name="pdc" value="0">
            <input type="hidden" name="psc" value="0">
            <input type="hidden" name="txAmt" value="0">
            <input type="hidden" name="pid" value="<?php echo uniqid(); ?>">
            <input type="hidden" name="scd" value="EPAYTEST"> <!-- Merchant Code for Test -->
            <input type="hidden" name="su" value="http://localhost/your_project/success.php?q=su">
            <input type="hidden" name="fu" value="http://localhost/your_project/failure.php?q=fu">

            <input type="submit" value="Pay with E-sewa">
        </form>
    </div>

    <!-- JavaScript to Toggle Between Forms -->
    <script>
        const showForm1 = document.getElementById('showForm1');
        const showForm2 = document.getElementById('showForm2');
        const form1 = document.getElementById('form1');
        const form2 = document.getElementById('form2');

        // Show Cash on Delivery form
        showForm1.addEventListener('click', () => {
            form1.classList.remove('hidden');
            form2.classList.add('hidden');
        });

        // Show E-sewa form
        showForm2.addEventListener('click', () => {
            form2.classList.remove('hidden');
            form1.classList.add('hidden');
        });
    </script>
</body>

</html>
