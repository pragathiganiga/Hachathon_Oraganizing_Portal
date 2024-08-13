<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Hackathon Organising Portal | Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <?php
    include "../backend/getOrganiserId.php";
    ?>
    
    <div class="main_container">
        <div class="nav_bar">
            <div class="project_title">
                <center>
                    <h3><img src="../images/logo.gif" alt="">HOP</h3>
                    <p>Hackathon Organising Portal</p>
                </center>
            </div>

            <div class="feature">
                <h5>Organiser Id: 
                    <?php
                    echo $organiserId;
                    ?>
                </h5>
            </div>

            <a href="organiserdashboard.php">
                <div class="feature">
                    <h5><img src="../images/home.png" alt=""> Home</h5>
                </div>
            </a>

            <a href="updateprofile.php">
                <div class="feature">
                    <h5><img src="../images/dashboard.png" alt=""> Update profile</h5>
                </div>
            </a>

            <a href="hackathondetails.php">
                <div class="feature">
                    <h5><img src="../images/dev.png" alt=""> Hackathon details </h5>
                </div>
            </a>

            <a href="teams.php">
                <div class="feature">
                    <h5><img src="../images/teams.png" alt=""> Teams</h5>
                </div>
            </a>

            <a href="project.php">
                <div class="feature">
                    <h5><img src="../images/project.png" alt=""> Project</h5>
                </div>
            </a>

            <a href="winners.php">
                <div class="feature">
                    <h5><img src="../images/winner.png" alt=""> Winners</h5>
                </div>
            </a>

            <a href="evaluator.php">
                <div class="feature">
                    <h5><img src="../images/evaluators.png" alt=""> Evaluator</h5>
                </div>
            </a>

            <div class="feature logout">
                <h5><img src="../images/logout.png" alt="">Logout</h5>
            </div>
        </div>

        <div class="nav_result">
            <h1>Winner</h1>
        </div>
    </div>

</body>


</html>