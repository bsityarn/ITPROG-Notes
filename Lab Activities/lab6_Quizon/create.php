<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 27, 2026 -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add new Movie</h1>
    <form method="post" action="">
    <table>
        <tr>
            <td><p>Enter movie title:<p></td>
            <td><input type="text" name="movieTitle" size="25" required/></td>
        </tr>
        <tr>
            <!-- CHALLENGE 1 SERVER-SIDE VALIDATION -->
             <!-- by setting input as number and defining a min and max, we validate the input already -->
            <td><p>Enter year released:<p></td>
            <td><input type="number" name="yearReleased" min="2000" max="2026" value="2026" required/></td>
        </tr>
        <tr>
            <td><p>Enter director name:<p></td>
            <td><input type="text" name="director" size="25" required/></td>
        </tr>
        <tr>
            <td><p>Date added:<p></td>
            <td><input type="date" name="dateAdded" required/></td>
        </tr>
    </table>
        <input type="submit" name="save" value="Submit" /><br /> 
    </form>   
</body>
</html>

<?php
//Process the form
if (isset($_POST['save'])) { // Removes the warnings, it ensures that POST is only done once the form is submitted
    
    $movieTitle = $_POST['movieTitle'];
    $yearReleased = $_POST['yearReleased'];
    $director = $_POST['director'];
    $dateAdded = $_POST['dateAdded'];

    $stmt = $conn->prepare("INSERT INTO movies(title, releaseYear, director, date_added) VALUE(?,?,?,?)");
    $stmt->bind_param("ssss", $movieTitle, $yearReleased, $director, $dateAdded);

    if($stmt->execute()){
        echo "Record added successfully. Redirecting in 3 seconds";
        // Redirects to read.php after 3 seconds
        header("refresh:3;url=read.php");
    }else{
        echo "Error adding record ";
    }
}
?>