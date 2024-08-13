<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Organising Portal | Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
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
            <div class="manage_hackathon">
                
            <form action="../backend/manageHackathon.php" method="POST" class="hackathon_form">
                <h4>Add or Update your Hackathon</h4>
                <br>

                <?php
                // Check if registered successfully
                if (isset($_GET['hackathonAdded']) && $_GET['hackathonAdded'] == 'success') {
                    echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Hackathon Added Successfully!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                }

                if (isset($_GET['hackathonUpdated']) && $_GET['hackathonUpdated'] == 'success') {
                    echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Hackathon Updated Successfully!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                }

                if (isset($_GET['hackathonDeleted']) && $_GET['hackathonDeleted'] == 'success') {
                    echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Hackathon Deleted Successfully!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                }

                ?>
              

                <div class="form-group">
                        <label for="exampleInputPassword1">Hackathon Id: <span id="field0"></span></label>
                        <input type="hidden" id="field1" name="hackathon_id">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hackathon Name</label>
                    <input type="text" name="hackathon_name" class="form-control" id="field2"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Hackathon Location</label>
                    <input type="text" name="hackathon_loc" class="form-control" id="field3" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Hackathon Start Date</label>
                    <input type="date" name="hackathon_start_date" class="form-control" id="field4" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Hackathon End Date</label>
                    <input type="date" name="hackathon_end_date" class="form-control" id="field5" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Hackathon Status</label>
                    <input type="text" name="hackathon_status" class="form-control" id="field6" required>
                </div>

                <button type="submit" name="add_hackathon" class="btn btn-outline-secondary">Add</a></button>
                <button type="submit" name="update_hackathon" class="btn btn-outline-secondary">Update</a></button>
                <button type="submit" name="delete_hackathon"  class="btn btn-outline-secondary">Delete</a></button>
            </form>
            <div class="hackathon_table">
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
                    if (cells.length === 7) {
                        // Populate the form fields
                        document.getElementById('field0').innerHTML = cells[0].innerText;
                        document.getElementById('field1').value = cells[0].innerText;
                        document.getElementById('field2').value = cells[1].innerText;
                        document.getElementById('field3').value = cells[2].innerText;
                        document.getElementById('field4').value = cells[4].innerText;
                        document.getElementById('field5').value = cells[5].innerText;
                        document.getElementById('field6').value = cells[6].innerText;
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