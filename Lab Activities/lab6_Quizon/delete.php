<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 27, 2026 -->
<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM movies WHERE movieID = ?");
$stmt->bind_param('s', $id);
if($stmt->execute()){
    echo "Deleted successfully. Redirecting in 3 seconds...";
    // Redirects to update.php after 3 seconds
    header("refresh:3;url=read.php");
}

?>