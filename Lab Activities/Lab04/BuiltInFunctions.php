<?php  
// String functions - replace with your actual name 
$studentName = "Marc Lesley E. Quizon";  
echo "<h2>Built-in String Functions</h2>";  
echo "<p>Original: $studentName</p>";  
echo "<p>Uppercase: " . strtoupper($studentName) . "</p>";  echo "<p>Proper Case: " . ucwords($studentName) . "</p>";  
echo "<p>Length: " . strlen($studentName) . " characters</p>"; 
echo "<p>Replace 'Marc' with 'Handsome and Sexy': " . str_replace("Marc", "Handsome and Sexy",  $studentName) . "</p>"; 
echo "<p>The other 3 functions<p>";
//CHALLENGE THE # OTHER FUNCTIONS 
echo "<p>1. Repeat 'Super' 5 times: " . str_repeat("Super ", 5) . " handsome si $studentName </p>";
echo "<p>2. Count the number of words of Student's name: " . str_word_count("$studentName") . "</p>";
echo "<p>3. Find the position of the last occurrence of 'php' inside the string: " . strripos("I love php, I love php too!","PHP") . "</p>";
?>


<?php  
// Array functions 
$grades = [85, 92, 78, 95, 88];  
echo "<h2>Built-in Array Functions</h2>";  
echo "<p>Grades: " . implode(", ", $grades) . "</p>";  
echo "<p>Highest Grade: " . max($grades) . "</p>";  
echo "<p>Lowest Grade: " . min($grades) . "</p>"; 
echo "<p>Average: " . array_sum($grades) / count($grades) . "</p>";  echo "<p>Number of Grades: " . count($grades) . "</p>"; // Sort in  descending order sort($grades);  
echo "<p>Sorted (Ascending): " . implode(", ", $grades) . "</p>";
rsort($grades);
echo "<p>Sorted (Descending): " . implode(", ", $grades) . "</p>"; ?> 


<?php 
// Math functions 
$tuitionFee = 45789.567; 
echo "<h2>Built-in Math Functions</h2>"; 
echo "<p>Original Fee: ₱" . $tuitionFee . "</p>"; 
echo "<p>Rounded: ₱" . round($tuitionFee, 2) . "</p>"; 
echo "<p>Rounded Up (Ceiling): ₱" . ceil($tuitionFee) . "</p>"; echo "<p>Rounded Down (Floor): ₱" . floor($tuitionFee) . "</p>"; echo "<p>Random Number (1-100): " . rand(1, 100) . "</p>"; 
// Date functions 
echo "<h2>Built-in Date Functions</h2>"; 
echo "<p>Today's Date: " . date("F j, Y") . "</p>"; 
echo "<p>Current Time: " . date("h:i:s A") . "</p>"; 
echo "<p>Day of the Week: " . date("l") . "</p>"; 
