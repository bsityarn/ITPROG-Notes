<?php
session_start();
require 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM entries WHERE user_id = ? ORDER BY entry_date");
$stmt->bind_param("i", $user_id);

if($stmt->execute()){
    $result = $stmt->get_result();
}else{
    echo "Error retrieving your journal entries" . $stmt->error;
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
<header>
    <div class="navbar">
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/create.php'>New Entry</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/read.php'>My Journal</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/logout.php'>Logout</a></span>
    </div>
</header>
<body>
    <h1>Read your Journal Entries here!</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Mood</th>
            <th>Content</th>
            <th>Entry Date</th>
            <th>Functions</th>
        </tr>
        <tr>
            <?php
                $total_records = 0;
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['mood']}</td>";
                    echo "<td>{$row['content']}</td>";
                    echo "<td>{$row['entry_date']}</td>";
                    echo "<td> <a href='update.php?id={$row['id']}'>Edit</a> 
                    <a href='delete.php?id={$row['id']}'>Delete</a> </td>";
                    echo "</tr>";
                    $total_records++;
                }
            ?>
        </tr>
        <th></th>
    </table>
    <p>Total number of entries: <?php echo $total_records ?></p>


    
</body>
</html>