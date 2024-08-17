    <?php
        include "../connect.php";
        session_start();
        $user_email = $_SESSION['email'];
        $sql = "SELECT id FROM organiser where email='$user_email'";
        $go = $conn->query($sql);
        $row = $go->fetch_assoc();
        $organiserId = $row['id'];
    ?>