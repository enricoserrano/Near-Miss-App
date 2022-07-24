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
        require_once('../../conf/connectionInfo.php');
        $dbConn = @mysqli_connect($sql_host, $sql_user,$sql_pass,$sql_db);

        if(!$dbConn)
        {
            echo"<p>Connection to the Database has failed</p>";
        }
        else
        {
            //echo"<p>Connection to the Database is successful!</p>";

            
            $tableExist = @mysqli_query($dbConn, "SELECT * FROM nearMissImages;");

            if(!$tableExist)
            {
                $createTableQuery = "CREATE TABLE nearMissImages (imageID INT AUTO_INCREMENT PRIMARY KEY, imageFileName VARCHAR(100) NOT NULL, imageFiles longblob NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

                $createTableResult = mysqli_query($dbConn, $createTableQuery);

                if(!$createTableResult)
                {   
                    echo "<p>An error has occured in the creating the table. Please try again.</p>";
                }
                else
                {
                    echo "<p>The 'nearMissImages' table has been created successfully.</p>";
                }
            }

            if(isset($_POST['submit'])) 
            {
                if (getimagesize($_FILES['uploadedImageFile']['tmp_name']) == false) 
                {
                    echo "<p>Please choose a valid image file!</p>";
                } 
                else 
                {
                    $image = $_FILES['uploadedImageFile']['tmp_name'];
                    $imageFileName = $_FILES['uploadedImageFile']['name'];
                    $image = base64_encode(file_get_contents(addslashes($image)));

                    $insertImageIntoDBQuery = "INSERT INTO nearMissImages (imageFileName, imageFiles) 
                                        VALUES ('$imageFileName', '$image')";
                    $insertImageIntoDBResult = mysqli_query($dbConn, $insertImageIntoDBQuery);

                    if(!$insertImageIntoDBResult)
                    {   
                        echo "<p>An error has occured when inserting the image data in the table. Please try again.</p>";
                    }
                    else
                    {
                        echo "<p>Congratulations! The near-miss image has been successfully stored in the Database!</p>";

                    }
                }
            }
        }

        mysqli_close($dbConn);    

    ?>
    
</body>
</html>