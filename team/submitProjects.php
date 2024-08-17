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
        include "../backend/getTeamId.php";
        ?>
    <div class="main_container">
          <div class="nav_bar">
            <div class="project_title">
               <center><h3><img src="../images/logo.gif" alt="">HOP</h3>
              <p>Hackathon Organising Portal</p></center>
            </div>

            <div class="feature">
                <h5>Team Id: 
                    <?php
                    echo $teamId;
                    ?>
                </h5>
            </div>

            <a href="teamdashboard.php"><div class="feature">
                <h5><img src="../images/home.png" alt=""> Home</h5>
            </div></a>
            
            <a href="teamDetails.php"><div class="feature">
                <h5><img src="../images/dashboard.png" alt="">Team Details</h5>
            </div></a>

            <a href="hackathons.php"><div class="feature">
                <h5><img src="../images/dev.png" alt=""> Hackathons</h5>
            </div></a>

            <a href="submitProjects.php"><div class="feature">
                <h5><img src="../images/dev.png" alt="">Submit Project</h5>
            </div></a>
            
            <div class="feature logout">
                <h5><img src="../images/logout.png" alt="">Logout</h5>
            </div>
          </div>
         
        <div class="nav_result">
            <div class="manage_hackathon">

                <form action="../backend/updateTeams.php" method="POST" class="hackathon_form">
                    <h3>Submit Projects </h3> 
                    <br>
                    <br>
                <?php
                            // Check if registered successfully
                            if (isset($_GET['teamUpdated']) && $_GET['teamUpdated'] == 'success') {
                                echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Team Updated Successfully!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }

                            ?>
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hackathon Id:</label>
                                <input type="text" name="hackathon_id" class="form-control" id="field2" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Project Title:</label>
                                <input type="text" name="project_title" class="form-control" id="field3" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Team Id:</label>
                                <input type="text" name="team_id" class="form-control" id="field4" required>
                            </div>
                    
                        
                            <button type="submit" name="submit_project" class="btn btn-outline-secondary">Submit Project</a></button>
                        
                        </form>

        </div>
    </div>
</div>
    

</body>
    

</html>