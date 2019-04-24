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


// create an array of tables
$tableArray = array();


// the SQL for a user table
$userTable = "CREATE TABLE user (
    userID BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(255) NOT NULL,
    verified VARCHAR(3) NOT NULL,
    subscribed VARCHAR(3) NOT NULL,
    profilePic BLOB  
)";

// push table onto array
array_push($tableArray , $userTable);


// Preferences a different table?
$prefTable = "CREATE TABLE prefTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(30) NOT NULL,
    user_ID BIGINT UNSIGNED NOT NULL,
    CONSTRAINT fk_user_ID FOREIGN KEY (user_ID) REFERENCES user(userID)
)";

array_push($tableArray , $prefTable);

// update later with song duration?
$songTable = "CREATE TABLE songTable (
    song_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    song_file BLOB NOT NULL,
    album VARCHAR(255) NOT NULL,
    genre VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    listens BIGINT
)";

array_push($tableArray, $songTable);

$discSong = "CREATE TABLE discTable (
    song_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    song_file BLOB NOT NULL,
    album VARCHAR(255) NOT NULL,
    genre VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    listens BIGINT,
    verify VARCHAR(255) NOT NULL
)";

array_push($tableArray, $discSong);


// the plan is to create tables via looping through them

foreach( $tableArray as $table)
  {
    if( mysqli_query($conn, $table ))
      {
       echo "Table userTable created succesfully <br><br>";   
      }
    else
      {
       echo "Error creating table: " . mysqli_error($conn) ."<br><br>";
      }
  }




    


$conn->close();
?>