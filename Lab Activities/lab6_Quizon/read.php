<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 27, 2026 -->
<?php
include 'db.php';
$stmt1 = $conn->prepare("SELECT * FROM movies");
$stmt1->execute();

$result1= $stmt1->get_result();

//CHALLENGE 3 SUMMARY STATISTICS (see below for code for displaying)
$stmt2 = $conn->prepare("SELECT COUNT(*) AS numRecords FROM movies");
$stmt2->execute();
$result2= $stmt2->get_result()->fetch_assoc();//We fetch the row with the value
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vice Ganda Movie Database</h1>
    <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Year Released</th>
                <th>Director</th>
                <th>Date Added</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        <tr>
            <?php
                while ($row = $result1->fetch_assoc()){
                    //CHALLENGE 2 DATA FORMATTING
                    //Before displaying it we convert it into format February-1-26 before echoing
                    $dateForDB = date('F-j-Y', strtotime($row['date_added']));
                    echo "<tr>";
                    echo "<td>{$row['movieID']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['releaseYear']}</td>";
                    echo "<td>{$row['director']}</td>";
                    echo "<td>$dateForDB</td>";
                    echo "<td><a href='update.php?id={$row['movieID']}'>Edit</a> </td>";
                    echo "<td><a href='delete.php?id={$row['movieID']}'>Delete</a></td>";
                    echo "</tr>";             
                }
            ?>
            </tr>
    </table>
    
</body>
<footer>
    <form action="create.php">
            <input type="submit" value="Add new Record">
    </form>
        <?php
            //CHALLENGE 3 SUMMARY STATISTICS
            //$result2 is an array, to display it wit echo, you need to flatten it by using implode
            $totalRecordSTR = implode(" ", $result2);
            echo "<p style='text-align: center; '> $totalRecordSTR records in total</p><?>";
        ?>
</footer>
</html>