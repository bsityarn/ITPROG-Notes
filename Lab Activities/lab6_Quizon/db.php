
<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 27, 2026 -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "vicegandeDB";
$db_port = 3307; //!!!!! May need to change depending on your port number

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn;

try {
    //Creates the connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $db_port);
} catch (mysqli_sql_exception $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>