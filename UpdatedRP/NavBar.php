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
                localStorage.setItem('timeStamp',audio.currentTime);
            }
            
            function checkPlaySession()
            {
                if( audio.paused )
                    {
                        sessionStorage.setItem('status', 'paused');
                    }
                else
                    {
                        sessionStorage.setItem('status', 'playing');
                    }
            }
            
            
            /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
            
        
        
        
        </script>
        
        <style>
        /*DROPDOWN START */
/* Dropdown Button */
.dropbtn {
  background-color: inherit;
  color: white;
  padding: inherit;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: cadetblue;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #9ebfc1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: cadetblue}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

/*DROPDOWN END*/
        
        
        </style>
	</head>
		
		
	<body onbeforeunload="updateTime();checkPlaySession()">
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
					<a href="DiscoverPage.php" onclick="updateTime()">Discover</a>
				</li>
				
				<li>
					<div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">User</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#">Settings</a>
                            <a href="#">Subscribe</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
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
