<!-- Marc Lesley E. Quizon laab 7 S01 March 13 2026-->

<?php
$xml = simplexml_load_file("books.xml"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the library</h1>
    <p>Here is the collection of books currently available. Happy reading! </p>

    <?php 
        echo "<h2>Library Book List</h2>"; 
        echo "<table>";
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Year</th>";

        foreach ($xml->book as $book) { 
        echo "<tr>";
        echo "<td>" .  $book->title . "</td>"; 
        echo "<td>" . $book->author . "</td>"; 
        echo "<td>" . $book->year . "</td>"; 
        } 
        echo "</table>";
?>  

<a href="writeXML.php">Add a book</a>
</body>
</html>