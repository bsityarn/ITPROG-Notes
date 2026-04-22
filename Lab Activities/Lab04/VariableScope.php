<?php 
$schoolName = "De La Salle University"; // Global variable 
function displaySchool() { 
 global $schoolName;
 echo "<p>School: $schoolName</p>"; 
} 
function displayDepartment() { 
 $department = "Computer Technology"; // Local variable  echo "<p>Department: $department</p>"; 
} 
function countVisits() { 
 static $counter = 0; // Static variable 
 $counter++; 
 echo "<p>This function has been called $counter time(s)</p>"; } 
displaySchool(); 
displayDepartment(); 
//echo $department; // Try uncommenting this 
echo "<h3>Static Variable Demo:</h3>"; 
countVisits(); 
countVisits(); 
countVisits(); 

?> 
