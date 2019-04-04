<?php
    // check that the elements aren't empty
    if(!empty($_GET['tid']) && !empty($_GET['product']))
        {
         // protects $_GET from SQL injections
         $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
         
         $tid = $GET['tid'];
         $product = $GET['product'];
        }
    // go back to home page
    else
        {
         header('Location: payment.php');
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <title>Payment Successful</title>
    </head>
        <div class="container mt-4">
            <h2>Thank you for your purchase</h2>
            <hr>
            <p>Your transaction ID is <?php echo $tid ?><p>
            <p>Check your email for more info</p>
            
            <!-- will need to be edited to right url -->
            <a href="payment.php" class="btn btn-success">Go Back</a>
        </div>
    <body>
    
    </body>
</html>