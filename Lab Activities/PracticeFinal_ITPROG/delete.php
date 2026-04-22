<?php
error_reporting(E_ALL);
   ini_set('display_errors', 1);
session_start();
require 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$entry_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM entries WHERE user_id = ? AND id = ?");
$stmt->bind_param("ii", $user_id, $entry_id);

if($stmt->execute()){
    echo "Entry deleted successfully. Redirecting to read.php";
    header("refresh:2;url=read.php");
}else{
    echo "Error deleting your journal entry" . $stmt->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    
</body>
</html>