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
      <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
      <title>The Near-miss form receipt</title>
      <link rel = "icon" type = "image/png" href = "./images/logo.png">
   </head>
   <body>
      <!-- Navbar -->
      <header>
         <!-- Navbar -->
         <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li>
                        <a href="index.html">
                           <div class="sub-menu">
                              <i class="bi bi-house-door"></i>
                              <p class="menu-title">Home</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="index.html#about-section">
                           <div class="sub-menu">
                              <i class="bi bi-info-square"></i>
                              <p class="menu-title">About</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="index.html#contact-section">
                           <div class="sub-menu">
                              <i class="bi bi-chat-left-text"></i>
                              <p class="menu-title">Contact</p>
                           </div>
                        </a>
                     </li>
                     <li>
                           <a href="adminlogin.html">
                              <div class="sub-menu">
                                 <i class="bi bi-person-circle"></i>
                                 <p class="menu-title">Admin</p>
                              </div>
                           </a>
                        </li>
                     <li>
                        <a href="record.html">
                           <div class="sub-menu">
                              <i class="bi bi-pencil-square"></i>
                              <p class="menu-title">Record</p>
                           </div>
                        </a>
                     </li>
                  </ol>
               </nav>
            </div>
         </nav>
         <!-- Navbar -->
      </header>
      <!-- Navbar -->
      <div class="receipt-text">
      <br>
      <br>
      <br>
      <br>
      <h1 >Near-miss Receipt</h1>
      <br>
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
                 
                 $createFormDataTable = "CREATE TABLE nearMissFormData (nearMissID INT(20) AUTO_INCREMENT PRIMARY KEY, nmSiteLocation VARCHAR(100), nmInSiteLocation VARCHAR(100), nmDesc VARCHAR(100), nmDateTime DATETIME, nmPriority VARCHAR(10),
                 imageFileName VARCHAR(100) NOT NULL, imageFiles longblob NOT NULL, caseStatus VARCHAR(15) DEFAULT 'Unresolved') ENGINE=InnoDB DEFAULT CHARSET=latin1;";
             
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
         
             $nmSiteLocation = $_POST["nmSiteLocation"];
             $nmInSiteLocation = $_POST["nmInSiteLocation"];
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
                 $insertFormDataQuery = "INSERT INTO nearMissFormData (nmSiteLocation, nmInSiteLocation, nmDesc, nmDateTime, nmPriority, imageFileName, imageFiles) VALUES ('$nmSiteLocation', '$nmInSiteLocation', '$nmDesc', '$nmDateTime', '$nmPriorityLevel', '$imageFileName', '$image');";
                 $insertFormDataResult = mysqli_query($dbConn, $insertFormDataQuery);
         
                 // If something is wrong with the inserting process and error message is shown
                 if (!$insertFormDataResult) {
                     echo "<p>There is an issue with adding information to the database. Try again.</p>";
                 } else {
                     echo "<p><strong>Congratulations!</strong> The record has been successfully stored! Here is your receipt.</p>";
                     $checkNearMissID = "SELECT * FROM `nearMissFormData` ORDER BY `nearMissID` DESC LIMIT 1";
                     $getNearMissID = mysqli_query($dbConn, $checkNearMissID);
                     
                     while($row = mysqli_fetch_assoc($getNearMissID))
                     {
                         echo "<p><strong>Near-miss Entry ID: </strong>".$row["nearMissID"]."</p>";
                         echo "<p><strong>Site Location: </strong>".$row["nmSiteLocation"]."</p>";
                         echo "<p><strong>In-Site location: </strong>".$row["nmInSiteLocation"]."</p>";
                         echo "<p><strong>Near-miss Description: </strong>".$row["nmDesc"]."</p>";
                         echo "<p><strong>Recorded Date and Time: </strong>".$row["nmDateTime"]."</p>";
                         echo "<p><strong>Filename of image uploaded: </strong>".$row["imageFileName"]."</p>";

                         $textFileHeader = "Near-miss receipt\n\n"; 
                         $recordedID = "Near-miss Entry ID: ".$row["nearMissID"]. "\n";
                         $recordedSiteLocation = "Site Location: ".$row["nmSiteLocation"]."\n";
                         $recordedInSiteLocation = "In-Site location: ".$row["nmInSiteLocation"]."\n";
                         $recordedDescription = "Near-miss Description: ".$row["nmDesc"]."\n";
                         $recordedDateTime = "Recorded Date and Time: ".$row["nmDateTime"]."\n";
                         $recordedImageFileName = "Filename of image uploaded: ".$row["imageFileName"]."\n";
                        
                         $receiptFile = fopen("nearMissReceipt.txt", 'w');
                         fwrite($receiptFile, $textFileHeader);
                         fwrite($receiptFile, $recordedID);
                         fwrite($receiptFile, $recordedSiteLocation);
                         fwrite($receiptFile, $recordedInSiteLocation);
                         fwrite($receiptFile, $recordedDescription);
                         fwrite($receiptFile, $recordedDateTime);
                         fwrite($receiptFile, $recordedImageFileName);
                         fclose($receiptFile);
                     }  
                 }
             }
         }
         mysqli_close($dbConn); 
         ?>
      <div>
      <br>
      <button class = "receipt-button receiptHomeBtn" onclick="location.href='index.html';">Return Home</button>
      <button class = "receipt-button receiptRecordBtn" onclick="location.href='record.html';">Record Another Near-miss</button>
      <a class="receipt-button downloadReceiptBtn" download href="nearMissReceipt.txt">Download Receipt</a>

   </body>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</html>