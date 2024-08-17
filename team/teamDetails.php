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
            <div class="manage_hackathon update_hacathon">
                
            <form action="../backend/updateTeams.php" method="POST" class="hackathon_form">
                <h4>Add or Delete your Teams</h4>

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
            
            
                        <div class="form-group">
                            <label for="exampleInputPassword1">Team Id: <span id="field0"></span></label>
                            <input type="hidden" id="field1" name="id">
                        </div>
            
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Team Name:</label>
                            <input type="text" name="team_name" class="form-control" id="field2" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Leader Name:</label>
                            <input type="text" name="leader_name" class="form-control" id="field3" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">College Name:</label>
                            <input type="text" name="college_name" class="form-control" id="field4" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mail Id:</label>
                            <input type="text" name="mail_id" class="form-control" id="field5" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile No:</label>
                            <input type="text" name="mob_no" class="form-control" id="field6" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password:</label>
                            <input type="text" name="password" class="form-control" id="field7" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" id="field8" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Team Member 2</label>
                            <input type="text" name="team_member" class="form-control" id="field9" required>
                        </div>
            
                        <button type="submit" name="update_teams" class="btn btn-outline-secondary">Update Team</a></button>
                        
                    </form>
                    <div class="hackathon_table">
                        <table class="table table-hover" id="hackathonTable">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Team Name</th>
                                    <th scope="col">Leader Name</th>
                                    <th scope="col">College Name</th>
                                    <th scope="col">Mail Id</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Member 2</th>

                                </tr>
                            </thead>
                            <tbody>
            
                                <?php
                                include '../connect.php';
                                $sql = "SELECT `id`, `team_name`, `leader_name`, `college_name`, `mail_id`, `mob_no`, `password`, `address`, `team_member` FROM `team`";  // Prepared Statement
                                $result = $conn->query($sql);  // Result Set
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['team_name'] . "</td>
                                            <td>" . $row['leader_name'] . "</td>
                                            <td>" . $row['college_name'] . "</td>
                                            <td>" . $row['mail_id'] . "</td>
                                            <td>" . $row['mob_no'] . "</td>
                                            <td>" . $row['password'] . "</td>
                                            <td>" . $row['address'] . "</td>
                                            <td>" . $row['team_member'] . "</td>
                                            
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

<script>
        // JavaScript to handle row click and populate form fields
        document.addEventListener('DOMContentLoaded', function() {
            var table = document.getElementById('hackathonTable');

            table.addEventListener('click', function(event) {
                var target = event.target;

                // Check if a table cell (td) was clicked
                if (target.tagName === 'TD') {
                    // Get the row that was clicked
                    var row = target.parentNode;

                    // Get the cells in the row
                    var cells = row.getElementsByTagName('td');

                    // Check if the row has the expected number of cells
                    if (cells.length === 9) {
                        // Populate the form fields
                        document.getElementById('field0').innerHTML = cells[0].innerText;
                        document.getElementById('field1').value = cells[0].innerText;
                        document.getElementById('field2').value = cells[1].innerText;
                        document.getElementById('field3').value = cells[2].innerText;
                        document.getElementById('field4').value = cells[3].innerText;
                        document.getElementById('field5').value = cells[4].innerText;
                        document.getElementById('field6').value = cells[5].innerText;
                        document.getElementById('field7').value = cells[6].innerText;
                        document.getElementById('field8').value = cells[7].innerText;
                        document.getElementById('field9').value = cells[8].innerText;
                    }
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>


    

</html>