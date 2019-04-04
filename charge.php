<?php
    $testCost = 5000; //cost is $50.00
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_fXNsAQI4J5XnoU3BdbEoJpSj');

    // Protect POST array from SQL injections
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    // creates a customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token,
    ));

    // charge the customer
    $charge = \Stripe\Charge::create(array(
        "amount" => $testCost,
        "currency" => "usd",
        "description" => "testing the description",
        "customer" => $customer->id
    ));

    // redirect to payment success
    header('Location: payment_success.php?tid='.$charge->id.'&product='.$charge->description);
?>