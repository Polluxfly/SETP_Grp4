<!---download composer,restart,vs open term, run composer require stripe/stripe-php-->
<?php
    require_once('vendor/stripe/stripe-php/init.php');

    \Stripe\Stripe::setApiKey('sk_test_51JDvfYBAnEfxUr6xazBxqik1mhczBN9WYJIMZTKmAdezMWoRsac1ndITSBEEXNi1hqbyX4JXtXZXtMFmlXO3qt88003aSGUTZN');

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $firstname = $POST['first_name'];
    $lastname = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

// Create customer
$customer = \Stripe\Customer::create(array(
    "email" => $email,	
    "source" => $token
));

// Charge customer, 5000 == $50
$charge = \Stripe\Charge::create(array(
    "amount" => 5000,
    "currency" => "sgd",
    "description" => "Course",
    "customer" => $customer->id
));

// Redirect success page.
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
