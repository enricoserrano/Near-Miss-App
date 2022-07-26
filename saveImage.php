<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Near Miss Image</title>
</head>
<body>
    <?php
    // Establishes connection to the DB by declaring and initialising the DB login details
    require_once "../../conf/connectionInfo.php";
    $dbConn = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);

    if (!$dbConn) {
        echo "<p>Connection to the Database has failed</p>";
    } else {
        //If the connection is successful the following occurs

        // Checks if the table exists
        $tableExist = @mysqli_query($dbConn, "SELECT * FROM nearMissImages;");

        // If the table doesnt exist, the table storing the near miss images is created
        if (!$tableExist) {
            $createTableQuery =
                "CREATE TABLE nearMissImages (imageID INT AUTO_INCREMENT PRIMARY KEY, imageFileName VARCHAR(100) NOT NULL, imageFiles longblob NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

            $createTableResult = mysqli_query($dbConn, $createTableQuery);

            // Error message is shown if the table cannot be created else a success message is shown
            if (!$createTableResult) {
                echo "<p>An error has occured in the creating the table. Please try again.</p>";
            } else {
                echo "<p>The 'nearMissImages' table has been created successfully.</p>";
            }
        }

        // Checks if post is clicked
        if (isset($_POST["submit"])) {
            // Checks if the uploaded image is valid
            // if (getimagesize($_FILES["uploadedImageFile"]["tmp_name"]) == false) {
            //     echo "<p>Please choose a valid image file!</p>";
            // } else {
                // If the image uploaded is valid, the following occurs

                // Declare and store image file and file name into variables
                $image = $_FILES["uploadedImageFile"]["tmp_name"];
                $imageFileName = $_FILES["uploadedImageFile"]["name"];
                $image = base64_encode(file_get_contents(addslashes($image)));

                // Insert the uploaded image and file name onto the database table
                $insertImageIntoDBQuery = "INSERT INTO nearMissImages (imageFileName, imageFiles) 
                                        VALUES ('$imageFileName', '$image')";
                $insertImageIntoDBResult = mysqli_query(
                    $dbConn,
                    $insertImageIntoDBQuery
                );

                // If something is wrong with the inserting process and error message is shown
                if (!$insertImageIntoDBResult) {
                    echo "<p>An error has occured when inserting the image data in the table. Please try again.</p>";
                } else {
                    // Successful message is shown if the near-miss has been stored successfully
                    echo "<p>Congratulations! The near-miss image has been successfully stored in the Database!</p>";
                    echo "<p>The following was saved into the database</p>";
                    echo "<p><b>Uploaded images:</b> " .
                        $imageFileName .
                        "</p>";
                }
            //}
        }
    }

    // Closes the connection to the DB
    mysqli_close($dbConn);
    ?>
    
</body>
</html>