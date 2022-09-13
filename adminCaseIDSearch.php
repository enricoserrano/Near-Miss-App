<?php
    if(!$_GET['id']) {
        echo "error";
    } else {
        $id = $_GET['id'];
        $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");

        $searchQuery = "SELECT * FROM `nearMissFormData` WHERE `nearMissID` = '$id'";
        $displaySearchResults = mysqli_query($establishCon, $searchQuery);
        
        if(mysqli_num_rows($displaySearchResults) > 0) {
            echo"<html>";
               echo"<head>";
               echo"<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' rel='stylesheet'/>";
               echo"<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap' rel='stylesheet'/>";
               echo"<link href='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css' rel='stylesheet'/>";
               echo"</head>";
               echo"<body>";
               
               echo "<div class='table-responsive'>";
               echo "<table class='table'>";
               echo "<thead>";
               echo "<tr>";
               echo "<th scope='col'>Case ID</th>";
               echo "<th scope='col'>Site Location</th>";
               echo "<th scope='col'>Insite Location</th>";
               echo "<th scope='col'>Description</th>";
               echo "<th scope='col'>Date and Time</th>";
               echo "<th scope='col'>Priority</th>";
               echo "<th scope='col'>Case Image</th>";
               echo "<th scope='col'>Status</th>";
               echo "</tr>";
               echo "</thead>";
               echo "<tbody>";
               while ($row = mysqli_fetch_assoc($displaySearchResults)){
                  echo "<tr>";
                  echo "<td>",$row["nearMissID"],"</td>";
                  echo "<td>",$row["nmSiteLocation"],"</td>";
                  echo "<td>",$row["nmInSiteLocation"],"</td>";
                  echo "<td>",$row["nmDesc"],"</td>";
                  echo "<td>",$row["nmDateTime"],"</td>";
                  echo "<td>",$row["nmPriority"],"</td>";
                  echo "<td><button type='button' class='btn btn-primary' data-mdb-toggle='modal' data-mdb-target='#","case",$row["nearMissID"],"'>View Image</button></td>";
                  echo "<div class='modal fade' id='","case",$row["nearMissID"],"' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                  echo "<div class='modal-dialog'>";
                  echo "<div class='modal-content'>";
                  echo "<div class='modal-header'>";
                  echo "<h5 class='modal-title' id='exampleModalLabel'>","Case ID: ",$row["nearMissID"],"</h5>";
                  echo "<button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></button>";
                  echo "</div>";
                  echo "<div class='modal-body'>";
                  echo '<img height="465px" width="465px" src=data:image;base64,' .$row['imageFiles']. ' />';
                  echo "</div>";
                  echo "<div class='modal-footer'>";
                  echo "<button type='button' class='btn btn-secondary' data-mdb-dismiss='modal'>Close</button>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to resolve this near-miss case?');\" href='resolve.php?id=",$row["nearMissID"],"' class='btn btn-success'>Resolve</a></td>";
                  echo "</tr>";
               }
               echo "</tbody>";
               echo "</table>";
               echo "</div>";
               echo"<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js'></script>";
               echo"</body>";
               echo"</html>";
               // Frees up the memory, after using the result pointer
               mysqli_free_result($displaySearchResults);
            //header("location:adminpage.php"); 
        } else {
            echo "error";
        }
    }
?>