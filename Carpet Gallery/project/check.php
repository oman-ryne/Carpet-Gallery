<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add to Cart Example</title>
<style>
    /* Styling for the icon */
    .cart-icon {
        font-size: 24px;
        color: #333;
    }
</style>
</head>
<body>
    <!-- Cart icon and its count -->
    <div id="cart">
        <span class="cart-icon">&#128722;</span>
        <span id="cart-count">0</span>
    </div>

    <!-- Add to Cart button -->
    <button id="add-to-cart-btn">Add to Cart</button>

    <script>
        // JavaScript to handle the button click and update the cart count
        document.getElementById("add-to-cart-btn").addEventListener("click", function() {
            // Get the current count from the cart
            var countElement = document.getElementById("cart-count");
            var count = parseInt(countElement.textContent);

            // Increment the count
            count++;

            // Update the count in the cart
            countElement.textContent = count;
        });
    </script>
</body>
</html>
