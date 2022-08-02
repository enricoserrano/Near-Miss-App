<?php
namespace Verot\Upload;

error_reporting(E_ALL);

// we first include the upload class, as we will need it here to deal with the uploaded file
include('./src/class.upload.php');

// set variables
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'tmp');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

$log = '';

?>
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
    <form action ="" method = "POST" enctype="multipart/form-data">
        <p>
           <label for="img">Select image:</label>
           <input type="file" id="img" name="imagefile" accept="image/*">
        </p>
        <input type="submit" value="Post" name="submit1">
     </form>
     
     <?php 
        $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");
        if(isset($_POST["submit1"])) {
            $image = file_get_contents($_FILES['imagefile']['tmp_name']);
            $name = $_FILES['imagefile']['name'];

            //Rescaling image
            
            $handle = new \Verot\Upload\Upload($_FILES['image_field']);
            if ($handle->uploaded) {
              $handle->file_new_name_body   = 'image_resized';
              $handle->image_resize         = true;
              $handle->image_x              = 100;
              $handle->image_ratio_y        = true;
              $handle->process('/home/user/files/');
              if ($handle->processed) {
                echo 'image resized';
                $handle->clean();
              } else {
                echo 'error : ' . $handle->error;
              }
            }

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
        }

?>
</body>
</html>