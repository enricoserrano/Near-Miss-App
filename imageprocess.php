<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Process</title>
</head>
<body>
    <h1>Processing Image</h1>
    <?php
        //require_once('../../conf/connectionInfo.php');

        //$image = $_FILES['imagefile']['tmp_name'];
        $name = $_FILES['imagefile']['name'];
        //$image = base64_encode(file_get_contents(addslashes($image)));
        $image = file_get_contents($_FILES['imagefile']['tmp_name']);
        /*
        //Decodes the image for rescaling
        $percent = 0.5;
        $data = base64_decode($image);
        $im = imagecreatefromstring($data);
        $width = imagesx($im);
        $height = imagesy($im);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
    
        $thumb = imagecreatetruecolor($newwidth, $newheight);
    
        // Resize
        imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
        // Output
        imagejpeg($thumb);
        $imagerescaled = base64_encode(file_get_contents(addslashes($thumb)));
*/
        $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");

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

           $insertData = "INSERT INTO `nearMissImages` (`imageFileName`, `imageFiles`) VALUES ('$name', '$image');";
           $initialiseInsert = mysqli_query($establishCon, $insertData);
           if(!$initialiseInsert) {
               echo "<p>There is an error with data insertion! Please try again</p>";
           } else {
              echo "<p>Image added to the database</p>";
           }
        }
        mysqli_close($establishCon);
        
    ?>
    <a href="http://cqp5107.cmslamp14.aut.ac.nz/upskilling/imagedisplay.php">View All images from database</a>
</body>
</html>