<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$selected_option = $_POST['select'];


if ($selected_option == 'organiser') {
    $checkQuery = "select * from organiser where email='$email' and password='$password'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("location: organiser/organiserdashboard.php");
        exit();
    } else {
        echo "Incorrect email or password";
    }
} else {
    $checkQuery = "SELECT * FROM team where mail_id='$email' and password='$password'";
    $result = $conn->query($checkQuery);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['mail_id'];
        header("location: team/teamdashboard.php");
        exit();
    } else {
        echo "Incorrect email or password";
    }
}
?>