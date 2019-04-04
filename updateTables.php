<?php
// This is where we create tables for the DB

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


// check if song exists in Database
function checkSong($song_title, $artist)
   {
    global $conn;
    
    // sql code selecting songs that have the same title and author
    $sql = "SELECT * FROM songTable WHERE title = '".$song_title."' AND artist = '".$artist."';";
    
    // checks the database for the sql code
    $tableCheck = mysqli_query($conn, $sql);
    
    // variable with number of rows as a result of selecting
    $songCount = mysqli_num_rows($tableCheck);
    
    // if count is greater than one that means the song with that artist is already in database
    //   else we return false because it is not in the database.
    if($songCount > 0)
    {
        return true;
    }
    return false;
   }



// create function that adds song table
function placeSongIntoTable($file, $album_name, $genre, $artist, $song_title)
   {
    global $conn;
    
    // sql string for adding song
    $songString =  "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('".$file.
        "', '".$album_name."', '".$genre."','".$artist."', '".$song_title."');";
    
    // check if song is in database
    if( checkSong( $song_title, $artist) )
       {
        // tells user the song is in the database already
        echo $song_title." by ".$artist." already exists.";
        echo "<br><br>";
       }
    
    // if valid add song to table
    elseif( mysqli_query($conn, $songString))
      {
       // tells user if song was successfully added
       echo $song_title. " by ".$artist." added successfully.";
       echo "<br><br>";
      }
    else
      {
       echo "Error: " . $songString . "<br>" . mysqli_error($conn);
       echo "<br><br>";
      }
   }

placeSongIntoTable('Unchanged.mp3','386SQUAD','HipHop','NOR.T.H', 'Unchanged');

placeSongIntoTable('Ocean.mp3','386SQUAD','HipHop','NOR.T.H', 'Ocean');

placeSongIntoTable('Reality.mp3','386SQUAD','HipHop','NOR.T.H', 'Reality');

placeSongIntoTable('Potential.mp3','386SQUAD','HipHop','NOR.T.H', 'Potential');

placeSongIntoTable('Peak.mp3','386SQUAD','HipHop','NOR.T.H', 'Peak');

placeSongIntoTable('Deep.mp3','386SQUAD','HipHop','NOR.T.H', 'Deep');


mysqli_close($conn);


?>