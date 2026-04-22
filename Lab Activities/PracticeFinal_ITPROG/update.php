
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
$stmt = $conn->prepare("SELECT * FROM entries WHERE user_id = ? AND id = ?");
$stmt->bind_param("ii", $user_id, $entry_id);

if($stmt->execute()){
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(!($row['user_id'] == $user_id)){
        echo "You are not authorized to view this";
        header("refresh:2;url=read.php");
    }
    
}else{
    echo "Error retrieving your journal entries" . $stmt->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="navbar">
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/create.php'>New Entry</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/read.php'>My Journal</a></span>
        <span><a href='/ITPROG_PHP/PracticeFinal_ITPROG/logout.php'>Logout</a></span>
    </div>
<body>
    <h1>Update your Journal Entries here!</h1>
    <!-- Best not to put action if the php is in itself -->
    <form method="POST" action=" ">
        <table>
            <tr>
                <td><label>Title</label></td>
                <td><input type="text" name="title" value="<?php echo $row['title']; ?>" required></td>
            </tr>
            <tr>
                <td><label>Mood</label></td>
                <td>
                <select name="mood" required>
                    <?php
                    $options = ['Happy', 'Neutral', 'Sad', 'Anxious', 'Excited'];
                    
                    foreach ($options as $option) {
                        // If the database value matches this option, add the 'selected' attribute
                        $selected = ($row['mood'] == $option) ? 'selected' : '';
                        echo "<option value=\"$option\" $selected>$option</option>";
                    }
                    ?>
                </select>  
                </td>
            </tr>
            <tr>
                <td><label>Content</label></td>
                <td><input type="text" name="content" value="<?php echo $row['content']; ?>"  required></td>
            </tr>
            <tr>
                <td><label>Entry Date</label></td>
                <td><input type="date" name="date" value="<?php echo date('Y-m-d', strtotime($row['entry_date'])); ?>" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="update">Update entry</button></td>
            </tr>
        </table>
    </form>
    
</body>
</html>

<?php
if(isset($_POST['update'])){
    $title = $_POST["title"];
    $mood = $_POST["mood"];
    $content = $_POST["content"];
    $entryDate = $_POST["date"];   

    $stmt2 = $conn->prepare("UPDATE entries  SET title = ?, mood = ?, content = ?, entry_date = ? WHERE id = ? AND user_id = ?");
    $stmt2->bind_param("ssssii", $title, $mood, $content, $entryDate, $entry_id, $user_id);

    if($stmt2->execute()){
        echo "Entry updated successfully. Redirecting back to Read.php in 2 seconds";
        header("refresh:2;url=read.php");
    }else{
        echo "Error updating entry" . $stmt2->error();

    }
}
?>