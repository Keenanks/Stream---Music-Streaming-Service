<!DOCTYPE html>

<html>
<head>
    <link rel = "stylesheet"
   type = "text/css"
   href = "login.css" />
</head>
    
    
<body>
    <form class="modal-content animate" method="post" action="checkLogin.php">
      <!--/////////////////////AFTER LOGIN CHECK IF USERNAME AND PASSWORD ARE RIGHT, WITH PHP? THEN GO TO THE HOMEPAGE CALLED HOMEPAGE.HTML AND MAKE SURE IT HAS THE PERSONS USERNAME
      https://stackoverflow.com/questions/9541238/how-to-go-to-new-html-page-from-php-script
///////////////////////////////////-->
      
    <div class="imgcontainer">
      <img src="stream-logo.png" alt="Avatar" style="width: ; height:175px">
    </div>
        
        <h2>Username or Password are Incorrect</h2>

    <div class="container">
      <label for="name" style="color: black"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>

      <label for="psw" style="color: black"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
        <br>
      <button type="submit">Login</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!--<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>

    <!--<div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!--<span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    -->
  </form>
    <button onclick="window.location = 'login.html'">Sign Up</button>
</body>



</html>