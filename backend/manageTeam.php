<?php
include '../connect.php';

$team_id = $_POST['id'];
$team_name = $_POST['team_name'];
$leader_name = $_POST['leader_name'];
$college_name = $_POST['college_name'];
$mail_id = $_POST['mail_id'];
$mob_no = $_POST['mob_no'];
$password = $_POST['password'];
$address = $_POST['address'];

if (isset($_POST['add_teams'])) {
    $sql = "INSERT INTO `team`(`team_name`, `leader_name`, `college_name`, `mail_id`, `mob_no`, `password`, `address`) 
    VALUES ('$team_name','$leader_name','$college_name', '$mail_id','$mob_no','$password ','$address')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/teams.php?teamAdded=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}


if (isset($_POST['delete_team'])) {
    $sql = "DELETE FROM `team` WHERE `id`='$team_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/teams.php?teamDeleted=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
