<?php 
session_start();

if(isset($_SESSION['accesscode'])) {
    session_destroy();

    echo "<script>location.href='adminlogin.php'</script>";
} else {
    echo "<script>location.href='adminlogin.php'</script>";
}
?>