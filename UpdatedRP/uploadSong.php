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

//print_r($_FILES);
//print_r($_POST);

$file = $_FILES['uploadFile']['name'];
$artist = $_POST['artist'];
//echo $_POST['artist'];
 
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





//method that checks if the file is an mp3
function checkMP3( $fileToCheck )
   {
    //get file type using pathinfo and the PATHINFO_EXTENSION
    $fileType = pathinfo( $fileToCheck , PATHINFO_EXTENSION );
    
    return $fileType == 'mp3';
   }

function getFileName( $fileToGetName )
{
    return pathinfo( $fileToGetName, PATHINFO_FILENAME );
}

// method that returns true if file size is larger than 0
/*function checkSize ( $fileToCheck )
   {
    //check if file is not empty
    $fileSizeCheck = filesize( $fileToCheck );
    return $fileSizeCheck;
   }*/

// function that returns a boolean value depending on the size of the file and file extension
function validityOfUpload( $fileToValidate )
   {
    return /*checkSize( $fileToValidate ) && */checkMP3( $fileToValidate );
   }

//fucntio that removes spaces from file after upload
function removeSpaces( $fileToRemoveSpaces )
   {
    $fileToRemoveSpaces = str_replace(' ','', $fileToRemoveSpaces);
   }

function renameFile( $fileToRename )
   {
    rename($fileToRename ,removeSpaces( $fileToRename )); 
   }

function removeMP3Ext( $fileWithExt )
   {
    $fileWithoutExt = str_replace('.mp3','', $fileWithExt);
    return $fileWithoutExt; 
   }
    

if( validityOfUpload( $file ) )
   {
    removeSpaces( $file );
    $songName = removeMP3Ext ( $file );
    placeIntoDiscover($file, 'N/A', 'Jazz', $artist, $songName, 0 ,'No');
    /*echo "<h1>File uploaded successfully</h1>";
             echo"<br><br>";
             echo "<a href = 'DiscoverPage.php'>Click here to go back</a>";
    */
   }


//$name = basename($_FILES['audioFile']['name']);
//$tempName = $_FILES['audioFile']['tmp_name'];


$location = './songs/';
$target = $location;
//echo $_FILES['uploadFile']['error'];

/*if(isset($_FILES['uploadFile']['name']))
{*/
    $tempName = $_FILES['uploadFile']['tmp_name'];
    $target .= $_FILES['uploadFile']['name'];
   /* if(!empty($name))
    {*/
        if( move_uploaded_file($tempName,$target))
            {
             echo "<h1>File uploaded successfully</h1>";
             echo"<br><br>";
             echo "<a href = 'DiscoverPage.php'>Click here to go back</a>";
            }
    /*}
}*/

else
{
    echo "<h1>Error uploading file</h1>";
}


//header('location: DiscoverPage.php');
?>