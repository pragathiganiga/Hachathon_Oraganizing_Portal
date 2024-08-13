<?php
include 'connect.php';
$team_name = $_POST['team_name'];
$leader_name = $_POST['leader_name'];
$college_name = $_POST['college_name'];
$mail_id = $_POST['mail_id'];
$mob_no = $_POST['mob_no'];
$password = $_POST['password'];
$address = $_POST['address'];

$checkEmail = "SELECT * FROM team where mail_id='$mail_id'";
$result = $conn->query($checkEmail);

if ($result->num_rows > 0) {
    echo "Email already exists!";
} else {
    $insertQuery = "INSERT INTO team(team_name, leader_name, college_name, mail_id, mob_no, password, address) VALUES('$team_name', '$leader_name', '$college_name','$mail_id','$mob_no', '$password', '$address')";

    if ($conn->query($insertQuery) === TRUE) {
        // Redirect to index.php with success message
        header("location: index.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>