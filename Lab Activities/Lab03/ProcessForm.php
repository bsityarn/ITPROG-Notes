<?php 
// Marc Lesley E. Quizon
// Hands-On Exercise No. 3 
// S15 Jan 30, 2026
ini_set("display_errors", 1); 
error_reporting(E_ALL); 
?> 
<html> 
<head><title>Student Information</title> 
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
<h1 align="center">Student Information</h1> 
<hr /> 
<table border="1" align="center"> 
<tr> 
 <td>Student Name: </td> 
 <td><?php echo $_POST["sname"]; ?></td> 
</tr>  
 <td>Student Gender: </td> 
 <td><?php $gender = $_POST["sgender"]; 
 echo $gender; ?></td> 
</tr>  
<tr>
    <td>Student Program: </td> 
    <td><?php $program = $_POST["sprogram"]; 
    echo $program; ?></td>
</tr>
<tr>
    <td>Birthdate: </td> 
    <td><?php $birthdate = $_POST["sdate"]; 
    echo $birthdate; ?></td>
</tr>
<tr>
    <td>Courses Enrolled: </td> 
    <td>
    <?php 
        if (isset($_POST['options'])){
            $courses_selected = $_POST['options'];
            foreach ($courses_selected as $course){
                echo "$course <br>" ;
            }
        } else{
            echo "No course selected";
        }

        
    ?>
    
    </td>
</tr>
</table> 
</body> 
</html> 
