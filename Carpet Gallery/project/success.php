<?php
if (isset($_GET['q']) && $_GET['q'] == 'su') {
    // eSewa payment validation
    $pid = $_GET['oid'] ?? ''; // Get the transaction ID from the URL
    $amt = $_GET['amt'] ?? 0; // Get the amount from the URL
    $refId = $_GET['refId'] ?? ''; // Get the reference ID from eSewa

    // Replace with your merchant details
    $scd = "YOUR_LIVE_MERCHANT_CODE";

    // eSewa verification endpoint
    $url = "https://esewa.com.np/epay/transrec";

    // Prepare data for validation
    $data = [
        'amt' => $amt,
        'scd' => $scd,
        'pid' => $pid,
        'rid' => $refId
    ];

    // Send POST request to eSewa for verification
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Check eSewa response
    if (strpos($response, "Success") !== false) {
        echo "<h1>Payment Successful!</h1>";
        echo "<p>Thank you for your payment. Your order has been placed successfully.</p>";

        // You can save order details to your database here
    } else {
        echo "<h1>Payment Verification Failed</h1>";
        echo "<p>There was an issue verifying your payment. Please contact support.</p>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
}
?>

