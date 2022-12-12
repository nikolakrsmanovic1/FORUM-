<?php   
session_start(); 
$_SESSION["loggedIn"] = 0;
$_SESSION["korisnicko"] = "";
header('Location:./login.php '); 
exit();
?>