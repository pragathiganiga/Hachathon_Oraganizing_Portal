<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$db = 'hackathon_organising_portal';
$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    echo "DB Connection Failed".$conn->connect_error;
}
?>