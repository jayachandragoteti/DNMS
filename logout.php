<?php   
session_start(); //to ensure you are using same session
unset($_SESSION['faculty']);
unset($_SESSION['student']);
session_unset();
session_destroy(); //destroy the session
header("location:./index.php"); //to redirect back to "index.php" after logging out
exit();
?>