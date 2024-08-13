<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Hackathon Organising Portal | Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <?php
    include "../backend/getOrganiserId.php";
    ?>

    <div class="main_container">
          <div class="nav_bar">
            <div class="project_title">
               <center><h3><img src="../images/logo.gif" alt="">HOP</h3>
              <p>Hackathon Organising Portal</p></center>
            </div>

    <div class="feature">
        <h5>Organiser Id: 
            <?php
                echo $organiserId;
            ?>
        </h5>
    </div>

            <a href="organiserdashboard.php"><div class="feature">
                <h5><img src="../images/home.png" alt=""> Home</h5>
            </div></a>
            
            <a href="updateprofile.php"><div class="feature">
                <h5><img src="../images/dashboard.png" alt=""> Update profile</h5>
            </div></a>

            <a href="hackathondetails.php"><div class="feature">
                <h5><img src="../images/dev.png" alt=""> Hackathon details </h5>
            </div></a>
            
            <a href="teams.php"><div class="feature">
                <h5><img src="../images/teams.png" alt=""> Teams</h5>
            </div></a>

            <a href="project.php"><div class="feature">
                <h5><img src="../images/project.png" alt=""> Project</h5>
            </div></a>

            <a href="winners.php"><div class="feature">
                <h5><img src="../images/winner.png" alt=""> Winners</h5>
            </div></a>

            <a href="evaluator.php"><div class="feature">
                <h5><img src="../images/evaluators.png" alt=""> Evaluator</h5>
            </div></a>

            <div class="feature logout">
                <h5><img src="../images/logout.png" alt="">Logout</h5>
            </div>
          </div>
         
          <div class="nav_result">
          
          <form action="../backend/updateOrgProfile.php" method="POST" class="update_details_form">

                <?php
                include '../connect.php';
                $sql = "SELECT org_name, email, mob_no, password FROM organiser WHERE id = '$organiserId'";  // Prepared Statement
                $result = $conn->query($sql);  // Result Set
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row['org_name'];
                    $email = $row['email'];
                    $mob_no = $row['mob_no'];
                    $password = $row['password'];
                }
                ?>

            <br><br><br>
                <center><h2>Your Details</h2></center>
                <br>
                <center><h5>Update or Verify your details</h5></center>
                <br>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Organiser Id:</label>
                    <input type="text" name="id" value="<?php echo $organiserId ?>" class="form-control" id="" required  >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Organiser Name:</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mail id:</label>
                    <input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mobile Number: </label>
                    <input type="number" name="mob_no" value="<?php echo $mob_no ?>" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password:</label>
                    <input type="text" name="password" value="<?php echo $password ?>" class="form-control" id="" required>
                </div>

               <center><button type="submit" name="update_hackathon" class="btn btn-outline-secondary">Update</a></button></center> 
</form>
          </div>
    </div>

</body>
    

</html>