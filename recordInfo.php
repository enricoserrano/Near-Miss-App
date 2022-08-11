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

        if(!$conn)
        {
            echo "<p>Connection with the database has failed</p>";
        }
        else
        {
            $formDataExist = @mysqli_query($dbConn, "SELECT * FROM nearMissFormData;"); //Data from database table saved into variable along with connection to database
            
            if(!$formDataExist) //Checks if there is data in the database table now stored in this variable
            { 
                echo "<p>The table 'recordFormData' does not exist, creating table now.</p>";
            
                //Creates columns for database table
                
                /*$createFormDataTable = "CREATE TABLE nearMissFormData (bookingReference VARCHAR(20) PRIMARY KEY, cname VARCHAR(50), phone VARCHAR(12),
                unumber VARCHAR(25), snumber int(4), stname VARCHAR(50), sbname VARCHAR(50), dsbname VARCHAR(50),
                currentDateTime DATETIME, bookingStatus VARCHAR(15) DEFAULT 'Unassigned');"; */
            
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
            
            //Change this to fit near-miss context

            /*
            //Block of code using Count and Padding to add BRN to bookingReference variable
            $bookingIndexSearch = "SELECT COUNT(*) FROM cabsOnline";
            $initialiseIndexCount = mysqli_query($conn, $bookingIndexSearch);
            $indexRow = mysqli_fetch_assoc($initialiseIndexCount);
            $countRowIndex = $indexRow["COUNT(*)"] + 1;
            $bookingIndexSearch = "BRN".str_pad($countRowIndex,5,"0",STR_PAD_LEFT);

            //Adds information into table collumns and stores it in a variable
            $query = "INSERT INTO cabsOnline (bookingReference, cname, phone, unumber, snumber, stname, sbname, dsbname, currentDateTime) 
            VALUES ('$bookingIndexSearch', '$cname', '$phone', '$unumber', '$snumber', '$stname', '$suburb', '$dsbname', '$currentDate + $currentTime');";
            $result = mysqli_query($conn, $query);

            if(!$result) //Checks if database table information was added
            {
                echo "<p>There is an issue with adding information to the database. Try again.</p>";
            }
            else
            {
                echo "<p>Congratulations! The record has been stored and saved with success! Here are you details:</p>";

                $checkBookingReference = "SELECT `bookingReference` FROM `cabsOnline` ORDER BY `bookingReference` DESC LIMIT 1";
                $getBookingReference = mysqli_query($conn, $checkBookingReference);
                $row = mysqli_fetch_assoc($getBookingReference);
                $displayBookingReferenceRow = $row["bookingReference"];

                echo "Booking Reference Number: ".$displayBookingReferenceRow;
                echo "<p>Pickup Time: $currentTime</p>";
                echo "Pickup Date: ".date("d/m/Y",strtotime($currentDate));
            }*/
        }
        mysqli_close($conn);
    ?>
</body>
</html>