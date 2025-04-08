<?php
require 'stripe/init.php';

\Stripe\Stripe::setApiKey('sk_test_51R9A5bIWhwa8vApyqkB5XTfpSiWOoEnF5HxX8O5qMMGfCCJHKUNV2KFku8o7qIlj3OGoWAzHqtr6La3wyK1cm2WV005OKrM6Ae');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => ['name' => 'The Cyber Dummy Guide'],
            'unit_amount' => 1
        ],
        'quantity' => 1
    ]],
    'mode' => 'payment',
    'success_url' => 'https://sec-reads-rg-bme6fxcdfbdxfngk.canadacentral-01.azurewebsites.net/success.php',
    'cancel_url' => 'https://sec-reads-rg-bme6fxcdfbdxfngk.canadacentral-01.azurewebsites.net/cart.php'
]);

header("Location: " . $session->url);
exit;
