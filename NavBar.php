<!DOCTYPE html>
<html Lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href ="homepage.css" />
		
        <script>
        
            function updateTime()
            {
                sessionStorage.setItem('timeStamp',audio.currentTime);
            }
            
            
        
        
        
        </script>
	</head>
		
		
	<body onbeforeunload="return updateTime()">
		<nav>
			<div class="logo" id = 'logoHome'>
				<a  href="homepage.php" onclick="updateTime()">
						<img  border="0" alt="Stream" src="stream-logo.png" width="100" height="100">
				</a>
			</div>
			
			<ul class="nav-buttons">
				
				<li>
					<a href="songpage.php" onclick="updateTime()">Music</a>
				</li>
				
				<li>
					<a href="#shop" onclick="updateTime()">Shop</a>
				</li>
				
				<li>
					<a href="#discover" onclick="updateTime()">Discover</a>
				</li>
				
				<li>
					<a href="login.html" onclick="updateTime()">User</a>
				</li>
			</ul>
			
			<div class="hamburger">
			
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			
			</div>
		
		</nav>

		<script src="NavBar_script.js"></script>
        
        <?php include('audioBar.php');?>
        
		
	</body>
    
    
</html>
