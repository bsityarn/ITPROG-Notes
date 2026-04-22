<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

session_start();
require 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}


if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $mood = $_POST['mood'];
    $content = $_POST['content'];
    $entryDate = $_POST['date'];

    $stmt = $conn->prepare("INSERT INTO entries(user_id, title, mood, content, entry_date)
    VALUES (?,?,?,?,?)");
    $stmt->bind_param("issss", $user_id, $title, $mood, $content, $entryDate);

    if($stmt->execute()){
        echo 'Journal entry successfully added. Redirecting to Read Entries';
        header("refresh:3;url=read.php");
    }else{
        echo 'Error adding record' . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="style.css">

</head>
<div class="navbar">
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/create.php'>New Entry</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/read.php'>My Journal</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/logout.php'>Logout</a></span>
    </div>
<body>
    <h1>Create a new Journal entry here!</h1>
    <form method="POST" action=" ">
        <table>
            <tr>
                <td><label>Title</label></td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td><label>Mood</label></td>
                <td>
                <?php
                    $options = ['Happy', 'Neutral', 'Sad', 'Anxious', 'Excited'];
                ?>
                <select name="mood" required>
                    <?php
                        foreach($options as $option){
                            echo "<option>$option</option>";
                        }
                    ?>
                </select>    
                </td>
            </tr>
            <tr>
                <td><label>Content</label></td>
                <td><input type="text" name="content" required></td>
            </tr>
            <tr>
                <td><label>Entry Date</label></td>
                <td><input type="date" name="date" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit entry</button></td>
            </tr>
        </table>
    </form>
    
</body>
</html>