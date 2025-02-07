<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'] * 100; // Convert to paisa
    $order_id = $_POST['order_id'];
    $order_name = $_POST['order_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validation
    if (!is_numeric($amount) || empty($order_id) || empty($order_name)) {
        $_SESSION['validate_msg'] = '<script>Swal.fire("Error!", "Invalid input data!", "error");</script>';
        header("Location: checkout.php");
        exit();
    }

    $postFields = [
        "return_url" => "http://localhost/khalti-payment/payment-response.php",
        "website_url" => "http://localhost/khalti-payment/",
        "amount" => $amount,
        "purchase_order_id" => $order_id,
        "purchase_order_name" => $order_name,
        "customer_info" => ["email" => $email, "phone" => $phone]
    ];

    $curl = curl_init("https://a.khalti.com/api/v2/epayment/initiate/");
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($postFields),
        CURLOPT_HTTPHEADER => [
            'Authorization: Key YOUR_TEST_SECRET_KEY',
            'Content-Type: application/json'
        ]
    ]);

    $response = curl_exec($curl);
    $responseArray = json_decode($response, true);

    if (isset($responseArray['payment_url'])) {
        header('Location: ' . $responseArray['payment_url']);
        exit();
    } else {
        $_SESSION['validate_msg'] = '<script>Swal.fire("Error!", "Payment initiation failed!", "error");</script>';
        header("Location: checkout.php");
        exit();
    }
}
