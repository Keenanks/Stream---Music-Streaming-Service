<?php

/* This is to create a Database Called StreamClient
      It only needs to be ran once as the database will always be there
      afterwards unless deleted
*/


// for now creating it on local machines as it is a prototype
$servername = "localhost";
$username = "root";
$password = "";

// this creates a connection to your MySQL
$conn = new mysqli($servername, $username, $password);

// Check if it was able to connect
if($conn->connect_error)
  {
   die("Connection failed: " . $conn->connect_error);  
  }

// Here we create the Database
$sql = "CREATE DATABASE streamclient";

if( $conn->query( $sql ) === TRUE )
  {
   echo "Database created successfully";
  }
else
  {
   echo "Error creating database: " . $conn->error;  
  }

// close the connection
$conn->close();
?>