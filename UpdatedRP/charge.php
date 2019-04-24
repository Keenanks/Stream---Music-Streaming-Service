<?php
    $testCost = 600; //cost is $6.00
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_fXNsAQI4J5XnoU3BdbEoJpSj');

    // Protect POST array from SQL injections
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    $product = \Stripe\Product::create([
        'name' => 'StreamSubscription',
        'type' => 'service'
        
    ]);


    $plan = \Stripe\Plan::create([
    'product' => $product->id,
    'nickname' => 'Monthly',
    'interval' => 'month',
    'currency' => 'usd',
    'amount' => 750,
    ]);

    // creates a customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token,
    ));

    // charge the customer
    $charge = \Stripe\Subscription::create(array(
        "customer" => $customer->id,
        'items' => [['plan' => $plan->id]]
    ));

    // redirect to payment success
    header('Location: payment_success.php');//?tid='.$charge->id);//.'&product='.$charge->description);
?>