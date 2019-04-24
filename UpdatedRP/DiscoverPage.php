<?php
session_start();

include('NavBar.php');

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

<!DOCTYPE HTML>

<html>
    <head>
       <title>Discover</title>
        
        
       <link rel = "stylesheet"
          type = "text/css"
          href = "discoverCSS.css"/>

        
        <script src="SongPage_Script.js"></script>
        
        <script>
            function displaySongsForTab(evnt, table)
            {
                var iter, content, links;
                
                content = document.getElementsByClassName("content");
                for( iter = 0; iter < content.length; iter++ )
                    {
                        content[iter].style.display = "none";
                    }
                
                links = document.getElementsByClassName("buttonTab");
                for( iter = 0; iter < links.length; iter++ )
                    {
                        links[iter].className = links[iter].className.replace(" active", "");
                    }
                
                document.getElementById(table).style.display = "block";
                evnt.currentTarget.className += " active";
                
            }
            
            
        </script>
    
    </head>

    <body>
        
       <!-- TODO

            1) create a button somewhere that has a popup needing a subscribed account
                in order to rate/verify artists
            2) layout the page like songpage but with the option to view all artists or only verified artists
       -->
        
    <!-- create a div that has two tabs
            1) For all indie artists
            2) Only verified artists
    
                then display the songs that fall in the category
    -->
        <br><br><br>
        <br><br><br>
        <div class='generalSongTable'>
            <div class="tabs">
                <button class="buttonTab" id="verified" onclick = "displaySongsForTab(event,'verifiedTable')">Discover Verified Indie Artists</button>
                
                <button class="buttonTab" id="allDiscover" onclick = "displaySongsForTab(event,'allTable')">Discover All Indie Artists</button>
            </div>
            
            <div class = "content" id="verifiedTable" style="display:block">
                <?php
        $sql = "SELECT song_id, title, artist, song_file FROM discTable WHERE verify = 'Yes'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $smallerSpacing;
    
    
    //STARTED THE DIV - THE TABLE - AND THE FIRST ROW OF HEADINGS HERE
    //$row = mysqli_fetch_assoc($result);
    $startDiv = "<div class = 'playDiv'>";
    $startTable = "<table class='songTable' 
            style='font-family: arial, sans-serif; border-collapse: collapse; width: 100%;''>";
    $enterRow = "<tr>";
    $enterHeadings = " <th style = 'font-size:22px;'>Song Name</th>
                        <th style = 'font-size:22px;'>Artist</th>
                            ";
    $endRow = "</tr>";
    echo $startDiv.$startTable.$enterRow.$enterHeadings.$endRow;
    
    while($row = mysqli_fetch_assoc($result)) 
       {
        
        
        $songInfo = "&emsp;<div class = 'songInfoDiv' style = 'display:none;' id = '".$row['title']."Test'>".$row['title'] . " by ". $row['artist'];
        echo $songInfo;
        
        
        $enterRow = "<tr>";
        $enterData = "<td class= 'SongNameClick' onclick = "."getSongInfo('".$row['title']."Test')".">"  .$row['title']. " </td><td> " .$row['artist']. " </td>";
        $endRow = "</tr>";

        
        echo $enterRow.$enterData.$endRow;

       }
    
    //END THE TABLE AND DIV HERE AFTER ALL THE SONGS HAVE BEEN ENTERED
        
        $endTable = "</table>";
        $endDiv = "</div>";
        echo $endTable.$endDiv;
   }
    
else 
   {
    echo "0 results";
   } 
                ?>

            
            
            </div>
            
            
            <div class = "content" id="allTable">
                <?php
        $sql = "SELECT song_id, title, artist, song_file FROM discTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $smallerSpacing;
    
    
    //STARTED THE DIV - THE TABLE - AND THE FIRST ROW OF HEADINGS HERE
    //$row = mysqli_fetch_assoc($result);
    $startDiv = "<div class = 'playDiv'>";
    $startTable = "<table class='songTable' 
            style='font-family: arial, sans-serif; border-collapse: collapse; width: 100%;''>";
    $enterRow = "<tr>";
    $enterHeadings = " <th style = 'font-size:22px;'>Song Name</th>
                        <th style = 'font-size:22px;'>Artist</th>
                            ";
    $endRow = "</tr>";
    echo $startDiv.$startTable.$enterRow.$enterHeadings.$endRow;
    
    while($row = mysqli_fetch_assoc($result)) 
       {

        
        $songInfo = "&emsp;<div class = 'songInfoDiv' style = 'display:none;' id = '".$row['title']."Test'>".$row['title'] . " by ". $row['artist'];
        echo $songInfo;
        
        
        $enterRow = "<tr>";
        $enterData = "<td class= 'SongNameClick' onclick = "."getSongInfo('".$row['title']."Test')".">"  .$row['title']. " </td><td> " .$row['artist']. " </td>";
        $endRow = "</tr>";

        
        echo $enterRow.$enterData.$endRow;

       }
    
    //END THE TABLE AND DIV HERE AFTER ALL THE SONGS HAVE BEEN ENTERED
        
        $endTable = "</table>";
        $endDiv = "</div>";
        echo $endTable.$endDiv;
   }
    
else 
   {
    echo "0 results";
   }
?>
            
            </div>
        
        
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
        
        
    <!-- If the user doesn't have a subscription, then they have X amount of uploads a month,
           else they have Y uploads per month
____________________________________________________________________________________________________

                if the user subscribes after uploading some songs they get Y+X... we have to make sure
                    we decrement X or Y after every upload
    -->
        
     <script>
         
        function submitUploadInfo()
           {
               document.getElementById('fileUpload').submit();
               document.getElementById('artistUpload').submit();
           }
        
        function getUser()
         {
             document.getElementById('artistName').value = sessionStorage.getItem('user');
             document.getElementById('artistName').readonly = true;
         }
        </script>
        
        <!-- Drag and drop pop up w/ browse option?? -->
    <button id="uploadBtn">Upload Song</button>
        
    <div id="uploadModal" class="modal">
       <span onclick="document.getElementById('uploadModal').style.display='none'" 
            class="close" title="Close Modal">&times;</span>

       <!-- Modal Content -->
       <form class="modal-content animate" method="post" action="uploadSong.php" enctype="multipart/form-data">
      
          <div class="imgcontainer">
             <img src="stream-logo.png" alt="Avatar" style="width: ; height:175px">
          </div>

          <div class="container">
              
              
              
             <label for="uploadFile" style="color: black"><b>Select .mp3 file</b></label>
             <input type="file" name="uploadFile" required>
            
             <label for="artist" style="color: black"><b>Artist</b></label>
             <input id = 'artistName'type="text"  value = '' name = "artist" type ='hidden'>
             <br>
             <br>
          <div style="text-align: center;">
             <input class='modalBtn' type="submit" onclick="getUser()"value = 'Upload'/>
             <button class='modalBtn'type="button" onclick="document.getElementById('uploadModal').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </div>
  </form>
  
</div>

        
        
        
        <script>
       var modal = document.getElementById('uploadModal');
       var button = document.getElementById('uploadBtn');
       var span = document.getElementsByClassName('close')[0];
        
       button.onclick = function()
          {
           modal.style.display = "block"; 
          }
       
       span.onclick = function()
          {
           modal.style.display = 'none'; 
          }
       window.onclick = function()
          {
           if( event.target == modal )
              {
               modal.style.display = 'none';
              }
          }
       
       
       
        
        
    </script>
        
        
    
        
        
        
        
        
        
        
    <!-- TODO

            
            **NOTE** Collect total amount of upvoats to verify artis **


            
            First check if the user is subscribed
                if user is not subscribed
                    popup pay for subscription or go back

                else
                    redirect to a new tab
                    there is a randomized list
                    to vote yes for someone the song has to be listened to in its entirity
                        otherwise, the user can skip before the end of song or end


//////////////////////////////////////////////////////////////////////////////////////////////////////
    -->
        
    <button id='helpArtistBtn'>Help Verify Indie Artists</button>
        
        
        
    <div id="verifyModal" class="modal">
       <span onclick="document.getElementById('uploadModal').style.display='none'" 
            class="close" title="Close Modal">&times;</span>

       <form class="modal-content animate" method="post" action="payment.php" enctype="multipart/form-data">
      
          

          <div class="container" style="text-align: center;">
              <h1>You must be subrscribed to verify artists</h1>
              
              
            
          <div style="text-align: center;">
             <input class='modalBtn' type="submit" value = 'Subscribe'/>
        </div>
    </div>
  </form>
  
</div>
<?php
        
        
        $findUser = 'SELECT subscribed FROM user WHERE userName ="'.$_SESSION['user'].'"';
        if(mysqli_query($conn,$findUser))
        {
           $value = mysqli_fetch_row(mysqli_query($conn,$findUser));
            
            if($value[0]!='Yes')
            {
                echo "<script>
        var modal2 = document.getElementById('verifyModal');
       var button2 = document.getElementById('helpArtistBtn');
       var span2 = document.getElementsByClassName('close')[1];
        
       button2.onclick = function()
          {
           modal2.style.display = 'block'; 
          }
       
       span2.onclick = function()
          {
           modal2.style.display = 'none'; 
          }
       window.onclick = function()
          {
           if( event.target == modal2 )
              {
               modal2.style.display = 'none';
              }
          }
        
        </script>";
            }
            else
            {
                echo "<script>
        
            
            
               document.getElementById('helpArtistBtn').onclick = function ()
               {
                location.href = 'verifyArtists.php';
               };
            
        
                    </script>";
            }
        }
        ?>
        
        
    
    
    </body>


</html>
<? php 
    mysqli_close($conn);
?>