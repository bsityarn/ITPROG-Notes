<?php 
// ========== USER-DEFINED FUNCTIONS ========== 
function formatStudentName($name) { 
 // Uses BUILT-IN functions: trim(), ucwords(), strtolower()  $cleanName = trim($name); 
 $properName = ucwords(strtolower($cleanName)); 
 return $properName; 
}
function validateEmail($email) { 
 // Uses BUILT-IN function: filter_var() 
 if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
 return true; 
 } else { 
 return false; 
 } 
} 
function computeAverage($prelim, $midterm, $finals) {  $average = ($prelim + $midterm + $finals) / 3; 
 return $average; 
} 
function getGradeStatus($grade) { 
 if ($grade >= 70) { 
 return "PASSED"; 
 } else { 
 return "FAILED"; 
 } 
} 
function getRemarks($grade) { 
 if ($grade >= 95) return "Excellent"; 
 elseif ($grade >= 90) return "Very Good"; 
 elseif ($grade >= 85) return "Good"; 
 elseif ($grade >= 80) return "Fair"; 
 else return "Needs Improvement"; 
} 
function generateStudentID($lastName) { 
 // Uses BUILT-IN functions: strtoupper(), substr(), rand(), date()  $prefix = strtoupper(substr($lastName, 0, 3)); 
 $randomNum = rand(1000, 9999); 
 $year = date("Y"); 
 return $prefix . "-" . $year . "-" . $randomNum; 
} 
function calculateTuition($units, $pricePerUnit, $discount = 0) {  $subtotal = $units * $pricePerUnit; 
 $discountAmount = $subtotal * ($discount / 100); 
 $total = $subtotal - $discountAmount; 
 return $total; 
} 
function getProgramFullName($programCode){
    $fullProgramName = "None found";
    if($programCode == "BSIT"){
        $fullProgramName = "Bachelor of Science in Information Technology";
    } elseif($programCode = "BSCS-ST"){
        $fullProgramName = "BACHELOR OF SCIENCE IN COMPUTER SCIENCE MAJOR IN SOFTWARE TECHNOLOGY";
    } elseif($programCode = "BSIS"){
        $fullProgramName = "Bachelor of Science in Information Systems";
    }else{
        $fullProgramName = "No match";
    }
    return $fullProgramName;
}
// ========== PROCESS FORM DATA ========== 
// Get form data 
$rawName = $_POST['name']; 
$email = $_POST['email']; 
$program = getProgramFullName($_POST['program']); //Can call function here
//$program = $_POST['program']; 
$units = $_POST['units']; 
$prelim = $_POST['prelim']; 
$midterm = $_POST['midterm']; 
$finals = $_POST['finals']; 
// Process using USER-DEFINED functions
$formattedName = formatStudentName($rawName); 
$isValidEmail = validateEmail($email); 
$average = computeAverage($prelim, $midterm, $finals); 
$status = getGradeStatus($average); 
$remarks = getRemarks($average); 
// Extract last name for ID generation 
$nameParts = explode(" ", $formattedName); // BUILT-IN function $lastName = end($nameParts); // BUILT-IN function 
$studentID = generateStudentID($lastName); 
// Calculate tuition with discount for high achievers 
$discount = ($average >= 95) ? 10 : 0; 
$totalFee = calculateTuition($units, 2500, $discount); 
// Use BUILT-IN functions for additional processing 
$enrollmentDate = date("F j, Y"); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
 <title>Enrollment Confirmation</title> 
 <style> 
 .info-box { 
 border: 2px solid #0066cc; 
 padding: 15px; 
 margin: 10px; 
 border-radius: 5px; 
 } 
 .passed { color: green; font-weight: bold; } 
 .failed { color: red; font-weight: bold; } 
 </style> 
</head> 
<body> 
 <div class="info-box"> 
 <h2>Enrollment Confirmation</h2> 
 <p><b>Student ID:</b> <?php echo $studentID; ?></p>  <p><b>Student Name:</b> <?php echo $formattedName; ?></p>  <p><b>Email:</b> <?php echo $email; ?>  
 <?php echo $isValidEmail ? "✓ Valid" : "✗ Invalid"; ?></p>  <p><b>Program:</b> <?php echo $program; ?></p>  <p><b>Enrollment Date:</b> <?php echo $enrollmentDate; ?></p>  </div> 
 <div class="info-box"> 
 <h3>Academic Performance</h3> 
 <p><b>Prelim:</b> <?php echo $prelim; ?></p> 
 <p><b>Midterm:</b> <?php echo $midterm; ?></p>  <p><b>Finals:</b> <?php echo $finals; ?></p> 
 <p><b>Average Grade:</b> <?php echo number_format($average, 2);  ?></p> 
 <p><b>Status:</b> <span class="<?php echo strtolower($status);  ?>"> 
 <?php echo $status; ?></span></p> 
 <p><b>Remarks:</b> <?php echo $remarks; ?></p>
 </div> 
 <div class="info-box"> 
 <h3>Tuition Information</h3> 
 <p><b>Units Enrolled:</b> <?php echo $units; ?></p>  <p><b>Price per Unit:</b> ₱2,500.00</p> 
 <?php if ($discount > 0): ?> 
 <p><b>Discount:</b> <?php echo $discount; ?>% (High  Achiever Scholarship)</p> 
 <?php endif; ?> 
 <p><b>Total Fee:</b> ₱<?php echo number_format($totalFee, 2);  ?></p> 
 </div> 
</body> 
</html> 
