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
            echo"<p>Connection to the Database is successful!</p>";
        }
    ?>
    
</body>
</html>