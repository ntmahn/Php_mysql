<?php
require 'vendor/autoload.php';

#http://web_bds.com:2003

\Stripe\Stripe::setApiKey('2003'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];  // Amount in cents
    $currency = "vnd";
    $description = $_POST['description'];

    try {
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'payment_method_types' => ['card'],
        ]);

        echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thanh toán bất động sản</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <button id="checkout-button">Thanh toán với Stripe</button>
    <script>
        const stripe = Stripe('your_stripe_publishable_key'); // Add your publishable key

        document.getElementById('checkout-button').addEventListener('click', () => {
            fetch('thanhtoan.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    amount: 1000000,  // Amount in cents
                    description: "Thanh toán bất động sản"
                })
            })
            .then(response => response.json())
            .then(data => {
                stripe.redirectToCheckout({
                    sessionId: data.session_id
                });
            });
        });
    </script>
</body>
</html>
