<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <link rel = "stylesheet" href = "payment_style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <title>
            Make Payment
        </title>
    </head>
    <body>
        
        <?php
    include('NavBar.php');
    ?>

        <script src="https://js.stripe.com/v3/"></script>
    <div class="container">
        <h2 class="my-4 text-center">Checkout</h2>
        <form action="charge.php" method="post" id="payment-form">
            <div class="form-row">
            <input name="first_name" 
                   type = "text" 
                   class="form-control mb-3 StripeElement StripeElement--empty"
                   placeholder="First Name">
            <input name="last_name"
                   type="text"
                   class="form-control mb-3 StripeElement StripeElement--empty"
                   placeholder="Last Name">
            <input name="email"
                   type="email"
                   class="form-control mb-3 StripeElement StripeElement--empty"
                   placeholder="Email">
                
            <!-- add more input fields for address and phone number -->
                
            <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
        </script>
        <script src = "charge.js"></script>
    </body>
</html>