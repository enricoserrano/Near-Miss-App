<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Record Form Information PHP</title>
</head>
<body>
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
                    $checkNearMissID = "SELECT `nearMissID` FROM `nearMissFormData` ORDER BY `nearMissID` DESC LIMIT 1";
                    $getNearMissID = mysqli_query($dbConn, $checkNearMissID);
                    $row = mysqli_fetch_assoc($getNearMissID);
                    $displayNearMissIDRow = $row["nearMissID"];

                    //Will update this more when reciept code is done
                    echo "Near Miss Entry ID: ".$displayNearMissIDRow;
                }
                
            }

            //Block of code using Count and Padding to add BRN to bookingReference variable
            //$nearMissIDIndexSearch = "SELECT COUNT(*) FROM nearMissFormData";
            /*$initialiseIndexCount = mysqli_query($conn, $nearMissIDIndexSearch);
            $indexRow = mysqli_fetch_assoc($initialiseIndexCount);
            $countRowIndex = $indexRow["COUNT(*)"] + 1;
            $nearMissIDIndexSearch = "NME".str_pad($countRowIndex,5,"0",STR_PAD_LEFT);*/

            // $nmDesc = $_POST["description"];
            // $nmDateTime = $_POST["dateTime"];
            // $nmPriorityLevel = $_POST["priority"];

            // //Adds information into table collumns and stores it in a variable
            // $query = "INSERT INTO nearMissFormData (nmDesc, nmDateTime, nmPriority) VALUES ('$nmDesc', '$nmDateTime', '$nmPriorityLevel');";
            // $result = mysqli_query($dbConn, $query);

            // if(!$result) //Checks if database table information was added
            // {
            //     echo "<p>There is an issue with adding information to the database. Try again.</p>";
            // }
            // else
            // {
            //     echo "<p>Congratulations! The record has been stored and saved with success! Here are you details:</p>";

            //     $checkNearMissID = "SELECT `nearMissID` FROM `nearMissFormData` ORDER BY `nearMissID` DESC LIMIT 1";
            //     $getNearMissID = mysqli_query($dbConn, $checkNearMissID);
            //     $row = mysqli_fetch_assoc($getNearMissID);
            //     $displayNearMissIDRow = $row["nearMissID"];

            //     //Will update this more when reciept code is done
            //     echo "Near Miss Entry ID: ".$displayNearMissIDRow;
            // }
        }
        mysqli_close($dbConn);
    ?>
</body>
</html>