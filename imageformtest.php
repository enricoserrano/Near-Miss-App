<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload an image</title>
</head>
<body>
    <h1>Upload an Image</h1>
    <form action ="" method = "POST" enctype="multipart/form-data" name="myForm">
        <p>
           <label for="imginput">Select image:</label>
           <input type="file" id="imginput" name="imagefile" accept=".jpg, .jpeg, .png">
           <input type="text" id="mydata" name="mydatafile" value="">
        </p>
        <input type="submit" value="Post" name="submit1">
     </form>
     <div id="wrapper"></div>
     <?php 
        $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");
        if(isset($_POST["submit1"])) {

        $image = $_FILES['imagefile']['tmp_name'];
        $name = $_FILES['imagefile']['name'];
        $image = (file_get_contents(addslashes($image)));
        $image3 = $_POST(['mydatafile']);
        $image4 = addslashes($image3);
        
        if(!$establishCon) {
            echo "<p>Failed to establish connection! Please try again</p>";
            exit();
            } else {
    
                if (!$tableExist) {
                    $createTableQuery =
                        "CREATE TABLE nearMissImages (imageID INT AUTO_INCREMENT PRIMARY KEY, imageFileName VARCHAR(100) NOT NULL, imageFiles longblob NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        
                    $createTableResult = mysqli_query($establishCon, $createTableQuery);
        
                    // Error message is shown if the table cannot be created else a success message is shown
                    if (!$createTableResult) {
                        echo "<p>An error has occured in the creating the table. Please try again.</p>";
                    } else {
                        echo "<p>The 'nearMissImages' table has been created successfully.</p>";
                    }
                }
    
            $insertData = "INSERT INTO `nearMissImages` (`imageFileName`, `imageFiles`) VALUES ('$name', '$image4');";
            $initialiseInsert = mysqli_query($establishCon, $insertData);
            if(!$initialiseInsert) {
                echo "<p>There is an error with data insertion! Please try again</p>";
            } else {
                echo "<p>Image added to the database</p>";
            }
            }
            mysqli_close($establishCon);
    }

?>
<script src="camera-rescale-function.js"> </script>
</body>
</html>