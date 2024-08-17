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
                <div class="organiser_dashboard_container">

                    <br>
                    <br>
                    <h4>All hackathon</h4>
                    <div class="all_active_hackathon_table ">
                        <table class="table table-hover" id="hackathonTable">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Organiser Id</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include '../connect.php';
                            $sql = "SELECT hackathonId, hackathonName, hackathonLocation, organiserId, startDate, endDate, status FROM hackathon";  // Prepared Statement
                            $result = $conn->query($sql);  // Result Set
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                                        <td>" . $row['hackathonId'] . "</td>
                                                        <td>" . $row['hackathonName'] . "</td>
                                                        <td>" . $row['hackathonLocation'] . "</td>
                                                        <td>" . $row['organiserId'] . "</td>
                                                        <td>" . $row['startDate'] . "</td>
                                                        <td>" . $row['endDate'] . "</td>
                                                        <td>" . $row['status'] . "</td>
                                                        
                                            </tr>";
                                }
                            }
                            ?>

                        </tbody>
                        </table>
                    </div>

                    
                    
                    
                </div>
          </div>
    </div>

</body>
    

</html>