<?php 
// Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 7, 2026
ini_set("display_errors", 1); 
error_reporting(E_ALL); 
?> 

<html> 
<img src="images/DLSU_logo.png" alt="DLSU logo">
<!-- <style>
    img {
    width: 180px;
    float:inline-start;/*the image is displayed on the same line at the start */
}
</style> -->
<head><title>Completed Course Report</title> 
<link rel="stylesheet" href="style_Quizon1.css">
<style> 
 tr, td{ 
 padding:10px; 
 } 
  
 td:nth-child(even){ 
 background-color: #D6EEEE; 
 width: 200px; 
 } 
</style> 
</head> 

<body> 
<h1 align="center">Completed Course Report</h1> 
<hr /> 
<table border="1" align="center"> 
<style>
    table{
    width: 60%;
    border-collapse:collapse; /* Removes the space between cells in the table */
    margin-bottom: 0px;
    background-color: aliceblue;
}
    </style>
<tr> 
 <td>Student Name: </td> 
 <td><?php echo $_POST["sname"]; ?></td> 
</tr>  
 <td>Student Program: </td> 
 <td><?php $program = $_POST["program"]; 
 echo $program; ?></td> 
</tr>  
<tr>
    <td>Topics Completed: </td> 
    <td><?php $completed = $_POST["completed"]; 
    echo $completed; ?></td>
</tr>
<tr>
    
    <?php
    //Define the arrays for each program first
    $CCICOMPcourses = ['Number Systems & Arithmetic', 'Data Representation', 'Computer Architecture & Hardware', 
    'Operating Systems & Software', 'Networking & Internet'];
    $CCPROG3courses = ['Java Fundamentals', 'OOP core', 'UML Diagrams', 'System Design & Modeling', 'Exception handling'];
    $CCINFOMcourses = ['Database Fundamentals', 'SQL Statements', 'Database Design', 'Database Application', 'Application development'];
    ?>

    <td>Topics: </td> 
    <td>
    <?php 
    $courseChosen = $_POST["course"]; 
    echo "$courseChosen <br>";
    echo "<ol>";
    //Depending on the user input, we choose which array to print out
    if($courseChosen == 'CCICOMP')   {
        foreach ($CCICOMPcourses as $topic){
                echo "<li> $topic </li>" ;
            }
    } elseif($courseChosen == 'CCPROG3') {
        foreach ($CCPROG3courses as $topic){
                echo "<li> $topic </li>" ;
            }
    }elseif($courseChosen == 'CCINFOM') {
        foreach ($CCINFOMcourses as $topic){
                echo "<li> $topic </li>" ;
            }
    }
    echo "</ol>";
    ?></td>
</tr>
<tr>
    <td>Progress Percent:</td> 
    <td>
    <?php 
    $numComplete = $_POST['completed'];
    $progressPercent=($numComplete/5) * 100;
    echo $progressPercent . "%";
    ?>
    </td>
</tr>
<tr>
    <td>Progress Message:</td> 
    <td>
    <?php 
    //We use the same variable set earlier
    if ($progressPercent >= 80){
        $progressMessage = "Excellent progress!";
    } elseif ($progressPercent >= 50){
        $progressMessage = "You are more than halfway there.";
    } else{
        $progressMessage="You need to focus more on this lab.";
    }
    echo $progressMessage;
    ?>
    </td>
</tr>
<tr>
    <td>Completed Topics:</td>
    <td>
    <?php 
    //Basis for this is the 'completed' variable, number only. Counting from the start of the array
    echo "<ol>";
    for ($i=0; $i<$numComplete; $i++){
        //Depending on the user input, we choose which array to print out
        if($courseChosen == 'CCICOMP')   {
            echo "<li> $CCICOMPcourses[$i] </li>";
        } elseif($courseChosen == 'CCPROG3') {
            echo "<li> $CCPROG3courses[$i] </li>";
        }elseif($courseChosen == 'CCINFOM') {
            echo "<li> $CCINFOMcourses[$i] </li>";
        }
    }
    echo "</ol>";
    ?>
    </td>
</tr>
</table> 
</body> 
</html> 
