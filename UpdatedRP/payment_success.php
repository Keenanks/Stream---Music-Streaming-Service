<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "streamclient";

// create connection to mySQL
$conn = mysqli_connect( $servername, $username, $password);

// connects to database
mysqli_select_db($conn, 'streamclient');

// check the connection
if( !$conn )
 {
  die( "Connection failed: " . mysqli_connect_error() );
 }
/*
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
        */
session_start();
$user = $_SESSION['user'];

if($user != null)
{
    $updateSQL = "UPDATE user SET subscribed = 'Yes' WHERE userName ='".$user."'";
    if(mysqli_query($conn,$updateSQL))
    {
        $br= '<br><br><br><br><br><br><br>';
        echo "<h1>You are now subscribed!</h1>";
    }
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
            <p>Your transaction ID is <?php// echo $tid ?><p>
            <p>Check your email for more info</p>
            
            <!-- will need to be edited to right url -->
            <a href="homepage.php" class="btn btn-success">Go Back</a>
        </div>
    <body>
    
    </body>
</html>