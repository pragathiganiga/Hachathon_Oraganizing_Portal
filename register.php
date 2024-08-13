<?php
include 'connect.php';
$org_name = $_POST['org_name'];
$email = $_POST['email'];
$mob_no = $_POST['mob_no'];
$password = $_POST['password'];

$checkEmail = "SELECT * FROM organiser where email='$email'";
$result = $conn->query($checkEmail);

if($result->num_rows > 0){
    echo "Email already exists!";
} else {
    $insertQuery = "INSERT INTO organiser(org_name, email, mob_no, password) VALUES('$org_name', '$email', '$mob_no','$password')";

    if($conn->query($insertQuery) === TRUE){
        // Redirect to index.php with success message
        header("location: index.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
