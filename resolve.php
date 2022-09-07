<?php
    $establishCon = @mysqli_connect("cmslamp14","nearmiss", "cHz4n3armiss2022", "nearmiss");
    if(!$_GET['id']) {
        echo "error";
    } else {
        $id = $_GET['id'];
    }
?>