<?php
require 'stripe/init.php';

\Stripe\Stripe::setApiKey('sk_test_51R9A5bIWhwa8vApyqkB5XTfpSiWOoEnF5HxX8O5qMMGfCCJHKUNV2KFku8o7qIlj3OGoWAzHqtr6La3wyK1cm2WV005OKrM6Ae');       //setting Stripe API Key

$check_out_session = \Stripe\Checkout\Session::create([         //creating a new Stripe Checkout session
    'payment_method_types' => ['card'],         //defining the payment method, currently only accepting card payments
    'line_items' => [[      //defining the product being purchased
        'price_data' => [   //defining information about the price and product
            'currency' => 'usd',        //using US dollars for currency
            'product_data' => ['name' => 'The Cyber Dummy Guide'],      //more product details
            'unit_amount' => 1      //amount to charge, smallest unit of currency is 1 cent
        ],
        'quantity' => 1     //number of units being purchased
    ]],
    'mode' => 'payment',        //defining the type of transaction, payment means one time payment (not subscription)
    'success_url' => 'https://sec-reads-rg-bme6fxcdfbdxfngk.canadacentral-01.azurewebsites.net/success.php',        //URL to redirect the user after the payment is successful
    'cancel_url' => 'https://sec-reads-rg-bme6fxcdfbdxfngk.canadacentral-01.azurewebsites.net/cart.php'             //URL to redirect the user if they cancel the payment
]);

header("Location: " . $check_out_session->url);         //sends HTTP 302 redirect to the browser
exit;
