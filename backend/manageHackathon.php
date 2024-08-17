<?php
include '../connect.php';
include 'getOrganiserId.php';

$hackathonName = $_POST['hackathon_name'];
$hackathonLoc = $_POST['hackathon_loc'];
$hackathonStartDate = $_POST['hackathon_start_date'];
$hackathonEndDate = $_POST['hackathon_end_date'];
$hackathonStatus = $_POST['hackathon_status'];
$hackathon_id = $_POST['hackathon_id'];

if(isset($_POST['add_hackathon']))
{
   $sql = "INSERT INTO `hackathon`( `hackathonName`, `hackathonLocation`, `organiserId`, `status`, `startDate`, `endDate`) 
   VALUES ('$hackathonName','$hackathonLoc','$organiserId','$hackathonStatus','$hackathonStartDate','$hackathonEndDate')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/hackathondetails.php?hackathonAdded=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['update_hackathon'])) {
    $sql = "UPDATE `hackathon` SET `hackathonName`='$hackathonName',`hackathonLocation`='$hackathonLoc',`organiserId`='$organiserId',`status`='$hackathonStatus',`startDate`='$hackathonStartDate',`endDate`='$hackathonEndDate' WHERE `hackathonId`='$hackathon_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/hackathondetails.php?hackathonUpdated=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['delete_hackathon'])) {
    $sql = "DELETE FROM `hackathon` WHERE `hackathonId`='$hackathon_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/hackathondetails.php?hackathonDeleted=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>