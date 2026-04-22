<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 27, 2026 -->
<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM movies WHERE movieID = ?");
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc(); // This holds the current database values
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Movie <?php echo $movie['movieID'];?></h1>
    <form method="post" action="">
        <table>
            <tr>
                <td>Edit movie title:</td>
                <td><input type="text" name="movieTitle" value="<?php echo $movie['title']; ?>" required/></td>
            </tr>
            <tr>
                <td>Edit year released:</td>
                <td><input type="number" name="yearReleased" value="<?php echo $movie['releaseYear']; ?>" required/></td>
            </tr>
            <tr>
                <td>Edit director name:</td>
                <td><input type="text" name="director" value="<?php echo $movie['director']; ?>" required/></td>
            </tr>
            <tr>
                <td>Edit date added:</td>
                <td><input type="date" name="dateAdded" value="<?php echo date('Y-m-d', strtotime($movie['date_added'])); ?>" required/></td>
            </tr>
        </table>
        <input type="submit" name="save" value="Update Record" />
    </form>   
</body>
</html>

<?php
    if (isset($_POST['save'])) {
        $movieTitle   = $_POST["movieTitle"];
        $yearReleased = $_POST["yearReleased"];
        $director     = $_POST["director"];
        $dateAdded    = $_POST["dateAdded"];

        $updateStmt = $conn->prepare("UPDATE movies SET title=?, releaseYear=?, director=?, date_added=? WHERE movieID=?");
        $updateStmt->bind_param("sssss", $movieTitle, $yearReleased, $director, $dateAdded, $id);

        if ($updateStmt->execute()) {
            echo "Record updated successfully! Redirecting in 3 seconds";
            header("refresh:3;url=read.php");
        } else {
            echo "Error updating record.";
        }
    }

?>