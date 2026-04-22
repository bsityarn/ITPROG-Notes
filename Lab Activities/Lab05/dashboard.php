
<?php 
// Lab 05 
// Marc Quizon S15 
// Feb 20
session_start();
if (!isset($_SESSION["user"])) { 
 header("Location: login.php"); 
} 

//8. Challenge (5pts)
// We simply create a specific cookie for each user
$username = $_SESSION["user"]; //Gets username
$visit_count = "visit_count_" . $username; //Give each cookie a user-specific name

//Use the user-specific variable for the count logic
if (isset($_COOKIE[$visit_count])) { 
 $count = $_COOKIE[$visit_count] + 1; 
} else { 
 $count = 1; 
}
setcookie($visit_count, $count, time() + 3600);

//9. Challenge (5pts)
//From lecture slide
echo "<script type='text/javascript'>
    alert('Welcome, $username!')
    </script>";

$notes = file("notes.txt");
?> 
<html> 
<head> 
    <title>Student Dashboard</title> 
</head> 
<body bgcolor='#a3d0d4'> 
    <h1>Student Learning Portal</h1> 
    <p> 
        Logged in as: <strong><font color='8e1f20' size='5'><?php echo  $_SESSION["user"]; ?></font></strong> 
    </p> 
        <hr /> 
        <h2>Dashboard Overview</h2> 
    <p> 
        This dashboard displays your visit activity, system reminders, and important notes related to PHP web programming concepts. </p>
    <h3>Visit Activity</h3> 
<p> 
You have accessed this dashboard 
<strong><?php echo $count; ?></strong> time(s). 
</p> 

<h3>System Notes</h3> 
<p> 
Below are important reminders for managing state in PHP applications: </p> 
<ul> 
<?php 
//Part 4.5 Challenge (5pts)
    for ($i=0; $i<2; $i++){
        echo "<li>$notes[$i]</li>";
    }
?> 
</ul> 

<a href="logout.php">Log out?</a>

</body> 
</html> 
