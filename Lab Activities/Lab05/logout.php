<?php 
// Lab 05 
// Marc Quizon S15 
// Feb 20
session_start(); 
$_SESSION[] = array(); //To unset session variables, may need to consider more validation for specific browsers

session_destroy(); 

header("Location: login.php"); 

?> 
