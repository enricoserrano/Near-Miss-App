<?php
    if(!$_GET['id']) {
        echo "error";
    } else {
        $id = $_GET['id'];
        $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");

        $updateQuery = "UPDATE `nearMissFormData` SET `caseStatus` = 'Resolved' WHERE `nearMissID` = '$id'";
        $updateData = mysqli_query($establishCon, $updateQuery);
        
        if($updateData) {
            header("location:adminpage.php"); 
        } else {
            echo "error";
        }
    }
?>