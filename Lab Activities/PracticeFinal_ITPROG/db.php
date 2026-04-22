<?php
$host     = 'localhost';
$dbname   = 'journal_db';
$username = 'root';
$password = '';
$port = 3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
