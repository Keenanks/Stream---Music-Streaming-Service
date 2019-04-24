<!DOCTYPE html>

<html>
<head>
    <link rel = "stylesheet"
   type = "text/css"
   href = "login.css" />
</head>
    
    
<body>
    <form class="modal-content3 animate" action="checkSignup.php" method="post">
    <h2 id = "warning">Username and Email Already Exists</h2>
    
    <div class="container">   
        
      <label for="uname" style="color: black" name="name"><b>Please choose a Username</b></label>
      <input type="text" placeholder="Enter Username" name="name" id="name" required>
          
     <label for="email" style="color: black"><b>Please enter your Email</b></label>
      <input type="text" placeholder="Enter Username" name="email" required>
        
      <label for="psw" style="color: black"><b>Please select a Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>    
        
      <label for="psw" style="color: black"><b>Re-enter your Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>    
        <br>
        <br>
      <button type="submit">SignUp</button>
        
        <!-- FIXED the button cancel button -->
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        
    
      
      <!--<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>
    </form>
    <button onclick="window.location = 'login.html'">Login</button>
</body>



</html>