    <?php
    include "../connect.php";
    session_start();
    $user_email = $_SESSION['email'];
    $sql = "SELECT id FROM team where mail_id='$user_email'";
    $go = $conn->query($sql);
    $row = $go->fetch_assoc();
    $teamId = $row['id'];
    ?>