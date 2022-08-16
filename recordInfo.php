<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/style.css">
    <style>
        p {
            color:white;
            font-size: 16px;
            text-align: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous""></script>
    <title>The Near-miss form receipt</title>
</head>
<body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="index.html">
                        <img src="./images/logo.png" height="45" width="45" alt="MDB Logo" loading="lazy" />
                        <b>Near-miss Application</b></a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Record Near-miss</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
                <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    <?php
        
        $dbConn = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");

        if(!$dbConn)
        {
            echo "<p>Connection with the database has failed</p>";
        }
        else
        {
            $formDataExist = @mysqli_query($dbConn, "SELECT * FROM nearMissFormData;"); //Data from database table saved into variable along with connection to database
            
            if(!$formDataExist) //Checks if there is data in the database table now stored in this variable
            { 
                echo "<p>The table 'recordFormData' does not exist, creating table now.</p>";
                
                $createFormDataTable = "CREATE TABLE nearMissFormData (nearMissID INT(20) AUTO_INCREMENT PRIMARY KEY, nmDesc VARCHAR(100), nmDateTime DATETIME, nmPriority VARCHAR(10),
                imageFileName VARCHAR(100) NOT NULL, imageFiles longblob NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            
                //Stores connection and collumn creation query variables as paramters in a result variable
                $tableResult = mysqli_query($dbConn, $createFormDataTable);

                if(!$tableResult) //Checks if the columns and database table is created and succesful
                {
                    echo "<p>There was an issue creating the columns in the database table. Please try again</p>";
                }
                else
                {
                    echo "<p>Successful query operation</p>";
                }
            }

            $nmDesc = $_POST["description"];
            $nmDateTime = $_POST["dateTime"];
            $nmPriorityLevel = $_POST["priority"];

            // Checks if post is clicked
            if (isset($_POST["submit"])) {
            // Checks if the uploaded image is valid
                // If the image uploaded is valid, the following occurs

                // Declare and store image file and file name into variables
                $image = $_FILES["uploadedImageFile"]["tmp_name"];
                $imageFileName = $_FILES["uploadedImageFile"]["name"];
                $image = base64_encode(file_get_contents(addslashes($image)));

                //Adds information into table collumns and stores it in a variable
                $insertFormDataQuery = "INSERT INTO nearMissFormData (nmDesc, nmDateTime, nmPriority, imageFileName, imageFiles) VALUES ('$nmDesc', '$nmDateTime', '$nmPriorityLevel', '$imageFileName', '$image');";
                $insertFormDataResult = mysqli_query($dbConn, $insertFormDataQuery);

                // If something is wrong with the inserting process and error message is shown
                if (!$insertFormDataResult) {
                    echo "<p>There is an issue with adding information to the database. Try again.</p>";
                } else {
                    echo "<p>Congratulations! The record has been stored and saved with success! Here are you details:</p>";
                    $checkNearMissID = "SELECT * FROM `nearMissFormData` ORDER BY `nearMissID` DESC LIMIT 1";
                    $getNearMissID = mysqli_query($dbConn, $checkNearMissID);
                    
                    
                    while($row = mysqli_fetch_assoc($getNearMissID))
                    {
                        echo "<p>Near-miss Entry ID: ".$row["nearMissID"]."</p>";
                        echo "<p>Near-miss Description: ".$row["nmDesc"]."</p>";
                        echo "<p>Recorded Date and Time: ".$row["nmDateTime"]."</p>";
                        echo "<p>Priority level: ".$row["nmPriority"]."</p>";
                        echo "<p>Filename of image uploaded: ".$row["imageFileName"]."</p>";
                    }
                    

                }
                
            }

           
        }
        mysqli_close($dbConn); 
    ?>

    <button class = "receipt-button receiptHomeBtn" onclick="location.href='index.html';">Return Home</button>
    <button class = "receipt-button receiptRecordBtn" onclick="location.href='record.html';">Record Near-miss</button>

</body>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

</html>