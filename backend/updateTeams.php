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
$team_member = $_POST['team_member'];

if (isset($_POST['update_teams'])) {
    $sql = "UPDATE `team` SET `team_name`='$team_name',`leader_name`='$leader_name',`college_name`='$college_name',`mail_id`='$mail_id ',`mob_no`='$mob_no',`password`='$password',`address`='$address',`team_member`='$team_member' where `id`='$team_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../team/teamDetails.php?teamUpdated=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>