<?php 
// Your name, Section, Date 
// Lab Exercise No. 4 - User-Defined Functions 
function displayCourseInfo() { 
 echo "<div style='border: 2px solid blue; padding: 10px; margin:  10px;'>"; 
 echo "<h3>IT-PROG: Integrative Programming</h3>"; 
 echo "<p>Instructor: Please see Appendix A</p>"; 
 echo "<p>Units: 3.0</p>"; 
 echo "</div>"; 
} 
// Call the function 
displayCourseInfo(); 

function calculateTuition($units, $pricePerUnit) { 
 $totalFee = $units * $pricePerUnit; 
 $discount = .50;
 $discountedFee = $totalFee - $discount;
 echo "<p>Total tuition for $units units: ₱" .  
number_format($totalFee, 2) . "</p>"; 
echo "<p>Discounted tuition for $units units: ₱" .  
number_format($discountedFee, 2) . "</p>"; 
} 
// Call the function with different arguments 
calculateTuition(21, 2500); 
calculateTuition(18, 2500);

function computeAverage($prelim, $midterm, $finals) { 
 $average = ($prelim + $midterm + $finals) / 3; 
 return $average; 
} 
function getGradeStatus($grade) { 
 if ($grade >= 70) { 
 return "PASSED"; 
 } else { 
 return "FAILED"; 
 } 
} 
// Use the functions 
$studentAverage = computeAverage(85, 90, 88); 
$status = getGradeStatus($studentAverage); 
echo "<h3>Student Grade Report</h3>"; 
echo "<p>Average: " . number_format($studentAverage, 2) . "</p>"; echo "<p>Status: <b>$status</b></p>"; 

?> 


