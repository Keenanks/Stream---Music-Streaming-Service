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
function checkSong($song_title, $artist, $table)
   {
    global $conn;
    
    // sql code selecting songs that have the same title and author
    $sql = "SELECT * FROM ".$table." WHERE title = '".$song_title."' AND artist = '".$artist."';";
    
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
function placeSongIntoTable($file, $album_name, $genre, $artist, $song_title, $listens)
   {
    global $conn;
    
    // sql string for adding song
    $songString =  "INSERT INTO songTable (song_file, album, genre, artist, title, listens) VALUES ('".$file.
        "', '".$album_name."', '".$genre."','".$artist."', '".$song_title."','".$listens."');";
    
    // check if song is in database
    if( checkSong( $song_title, $artist, 'songTable') )
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

function placeIntoDiscover($file, $album, $genre, $artist, $title, $listens, $verification)
{
    global $conn;
    
    // sql string for adding song
    $songString =  "INSERT INTO discTable (song_file, album, genre, artist, title, listens, verify)
    VALUES ('".$file."','".$album."', '".$genre."','".$artist."',
    '".$title."','".$listens."','".$verification."');";
    
    // check if song is in database
    if( checkSong( $title, $artist, 'discTable') )
       {
        // tells user the song is in the database already
        echo $title." by ".$artist." already exists.";
        echo "<br><br>";
       }
    
    // if valid add song to table
    elseif( mysqli_query($conn, $songString))
      {
       // tells user if song was successfully added
       echo $title. " by ".$artist." added successfully.";
       echo "<br><br>";
      }
    else
      {
       echo "Error: " . $songString . "<br>" . mysqli_error($conn);
       echo "<br><br>";
      }
}

placeSongIntoTable('Unchanged.mp3','386SQUAD','HipHop','NOR.T.H', 'Unchanged', 0);

placeSongIntoTable('Ocean.mp3','386SQUAD','HipHop','NOR.T.H', 'Ocean', 0);

placeSongIntoTable('Reality.mp3','386SQUAD','HipHop','NOR.T.H', 'Reality', 0);

placeSongIntoTable('Potential.mp3','386SQUAD','HipHop','NOR.T.H', 'Potential', 0);

placeSongIntoTable('Peak.mp3','386SQUAD','HipHop','NOR.T.H', 'Peak', 0);

placeSongIntoTable('Deep.mp3','386SQUAD','HipHop','NOR.T.H', 'Deep', 0);


////////// insert into discTable \\\\\\\\\\\

placeIntoDiscover('JazzyFrenchy.mp3', 'N/A', 'Jazz', 'Benjamin Tissot', 'JazzyFrenchy', 0 ,'Yes');

placeIntoDiscover('HappyRock.mp3', 'N/A', 'Rock', 'Benjamin Tissot', 'HappyRock', 0, 'No');


mysqli_close($conn);


?>