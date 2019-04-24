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


session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet"
    type = "text/css"
    href = "homepage.css" />
    
    
    
    <!--link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"-->
    
    
    <script src = SongPage_Script.js></script>
    
</head>
    
    
<body>
    
    
    <?php 
    

    
    /* This links the NavBar to the current page */
        include ( 'NavBar.php' );
    ?>
    
    <?php
// This is where we create tables for the DB



$sql = "SELECT song_id, title, artist, song_file FROM songTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $spacing;
    
    
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
        //COMMENTED OUT IS THE OLD CODE FOR PLAYING OUR SONGS WITH NO TABLE////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////LEAVE IT FOR LATER////////////////////////////////////////////////////
        
        //$functionString = "getSongInfo('".$row['title']."')";
        // create a button here and when clicked the button plays the song which will appear at
        //  the bottom of the screen.
        //$startDiv = "<div class = 'playDiv' id = '".$row['title']."'>";
        //$createPlayButton = "<button class='playButton' onclick = "."getSongInfo('".$row['title']."Test')"." >&#9658;</button>";
        
        $songInfo = "&emsp;<div class = 'songInfoDiv' style = 'display:none;' id = '".$row['title']."Test'>".$row['title'] . " by ". $row['artist'];
        echo $songInfo;
        
        
        $enterRow = "<tr>";
        $enterData = "<td class= 'SongNameClick' onclick = "."getSongInfo('".$row['title']."Test')".">"  .$row['title']. " </td><td> " .$row['artist']. " </td>";
        $endRow = "</tr>";

        
        echo $enterRow.$enterData.$endRow;

        /* create a div with a name to add a button that plays the song when selected
        echo "<div id = '" . $row["song_id"] . "'> <audio controls controlsList='nodownload'>
        <source src = ".$row['song_file']." /></audio>"
            . "  Title: " . $row['title'] . "    Artist: ". $row['artist'] . "<br><br>";
            */
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

mysqli_close($conn);
//include('audioBar.php');

?>

    
    
    

    
</body>
</html>