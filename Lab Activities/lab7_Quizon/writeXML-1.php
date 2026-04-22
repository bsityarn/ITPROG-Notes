<!-- Marc Lesley E. Quizon laab 7 S01 March 13 2026-->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Add a new book</h1>
    <p> Here is the form to add a new book. Please type in the following details </p>

    <form action="writeXML.php" method="POST">
    <label for="ftitle">Title:</label><br>
    <input type="text" id="ftitle" name="title"><br>
    
    <label for="fauthor">Author:</label><br>
    <input type="text" id="fauthor" name="author"><br>

    <label for="fyear">Year:</label><br>
    <input type="number" id="fyear" name="year" min="1901" max="2026" step="1" value="2026">

    <!-- A submit button to send the form data -->
    <input type="submit" name="insert" value="Submit">
</form>
<a href="readXML.php">View books</a>
</body>
</html>

<?php
    if(isset($_POST['insert'])){
    if(file_exists("books.xml")){
    $library = simplexml_load_file('books.xml');

    $book = $library->addChild('book');
    $book->addChild('title', $_POST['title']);
    $book->addChild('author', $_POST['author']);
    $book->addChild('year', $_POST['year']);
    file_put_contents('books.xml', $library->asXML());
    header('location:readXML.php');
    }
    }
?>