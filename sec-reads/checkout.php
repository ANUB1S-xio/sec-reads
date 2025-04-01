<?php
require 'stripe/init.php';
\Stripe\Stripe::setApiKey('sk_test_51R9A5bIWhwa8vApyqkB5XTfpSiWOoEnF5HxX8O5qMMGfCCJHKUNV2KFku8o7qIlj3OGoWAzHqtr6La3wyK1cm2WV005OKrM6Ae'); // Replace with your secret key

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Sec-Reads Cyber Book Bundle',
            ],
            'unit_amount' => 2999,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://sec-reads-app.azurewebsites.net/success.php',
    'cancel_url' => 'https://sec-reads-app.azurewebsites.net/cart.php',
]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Sec-Reads</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<script>
    var stripe = Stripe('pk_test_51R9A5bIWhwa8vApyImX2oJ6CrawhVSJz4wxv29pTUNBQf2afydQLpOtzXio5HEPiRcPcwq6ikTD6XKzLgT6ei9Sp00ttu2ghBq'); // Replace with your publishable key
    stripe.redirectToCheckout({ sessionId: "<?= $session->id ?>" });
</script>
</body>
</html>
