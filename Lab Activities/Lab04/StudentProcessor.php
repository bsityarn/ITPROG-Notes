<?php 
// USER-DEFINED FUNCTIONS that use BUILT-IN functions inside 
function formatStudentName($name) { 
 // Remove extra spaces using trim() - BUILT-IN 
 $cleanName = trim($name); 
 // Convert to proper case using ucwords() and strtolower() - BUILT IN 
 $properName = ucwords(strtolower($cleanName));
 return $properName; 
} 
function validateEmail($email) { 
 // Use built-in filter_var() function 
 if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
 return true; 
 } else { 
 return false; 
 } 
} 
function generateStudentID($lastName) { 
 // Combine BUILT-IN functions: strtoupper(), substr(), rand(),  date() 
 $prefix = strtoupper(substr($lastName, 0, 3)); 
 $randomNum = rand(1000, 9999); 
 $year = date("Y"); 
 return $prefix . "-" . $year . "-" . $randomNum; 
} 
// Test the functions 
$rawName = " jUAN deLa CRUZ "; 
$email = "juan.delacruz@dlsu.edu.ph"; 
$lastName = "delacruz"; 
echo "<h2>Student Information Processing</h2>"; 
echo "<p><b>Raw Input:</b> '$rawName'</p>"; 
echo "<p><b>Formatted Name:</b> " . formatStudentName($rawName) .  "</p>"; 
echo "<p><b>Email:</b> $email - " . (validateEmail($email) ? "Valid ✓" : "Invalid ✗") . "</p>"; echo "<p><b>Generated ID:</b> " . generateStudentID($lastName) .  "</p>"; 

//CHALLENGE
function analyzePassword($password) {
    $numChar = strlen($password) >= 8;
    $hasNumber = preg_match('/[0-9]/', $password);

    // c. Return strength based on conditions
    if ($numChar && $hasNumber) {
        return "Strong";
    } elseif ($numChar || $hasNumber) {
        return "Moderate";
    } else {
        return "Weak";
    }
}
//TODO come back
//TEST CHALLENGE 
echo analyzePassword("456700");

?> 
