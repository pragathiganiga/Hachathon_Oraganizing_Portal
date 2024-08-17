    <?php
    include '../connect.php';
    
    $org_id=$_POST['id'];
    $name=$_POST['name'];
    $email = $_POST['email'];
    $mob_no = $_POST['mob_no'];
    $password = $_POST['password'];

    $sql = "UPDATE `organiser` SET `org_name`='$name',`email`='$email',`mob_no`='$mob_no',`password`='$password' WHERE `id`='$org_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message
        header("location: ../organiser/updateprofile.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    
    ?>