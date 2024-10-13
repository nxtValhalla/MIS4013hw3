<?php
function get_db_connection(){
    // Define Azure database credentials
    $servername = "nba-rosters.mysql.database.azure.com"; // Azure server hostname
    $user = "MIS4013hw3"; // Azure MySQL username
    $pass = "Homework3"; // Azure MySQL Password
    $dbname = "nbarosters"; // Database name
    $port = 3306; // MySQL default port number

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname, $port);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
