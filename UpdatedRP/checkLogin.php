<?php
session_start();
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

?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
<?php
     //   session_start();

   // down the line we have to protect from SQL injection
    
   $user = $_POST['name'];
   $psw  = $_POST['psw'];
   $_SESSION['user'] = $user;

$sql = "SELECT userName, password FROM user WHERE userName = '".$user."' AND 
    password = '".$psw."'";

$result = mysqli_query($conn, $sql);



?>
        
        <?php 
         if (mysqli_num_rows($result) == 1) 
   {
             echo "<script>sessionStorage.setItem('user','".$user."');</script>";
             echo "<script> if (sessionStorage.getItem('user') == '".$user."')
             {
              window.location.href = 'homepage.php';
             }</script>";
             //header('Location: homepage.php');
   }
                              
        else
{
    echo "<script> alert('The password or username is incorrect, Please try again');</script>";
    header('Location: failedLogin.php');
}
        ?>
    
        
    </body>
</html>
<?php mysqli_close($conn);
?>