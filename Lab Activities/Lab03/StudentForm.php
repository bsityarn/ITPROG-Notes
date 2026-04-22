<!DOCTYPE html>
<html lang="en">
<head><title>Student Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style> 
    td:nth-child(even){ 
    background-color: #e0e0e0; 
    width: 200px; 
    } 
</style> 
</head>
<body>

<h2>Student Registration Form</h2> 
<hr /> 
<form method="post" action="ProcessForm.php"> 
<table> 
<tr> 
    <td>Enter a name:</td>  
    <td><input type="text" name="sname" size="25" required/></td> 
</tr> 
<tr> 
    <td>Select gender:</td> 
    <td><input type="radio" name="sgender" value="Male" /> Male  <input type="radio" name="sgender" value="Female" /> Female</td> </tr> 
<tr> 
    <td>Select program:</td> 
    <td><select name="sprogram"> 
    <option value="BSIT">BSIT</option> 
    <option value="BSCS-ST">BSCS-ST</option> 
    <option value="BSIS">BSIS</option> 
    <option value="BSCS-NIS">BSCS-NIS</option> 
    <option value="BSCS-CSE">BSCS-CSE</option> 
 </select> 
 </td> 
</tr> 
<tr> 
 <td>Select Birthdate: </td> 
 <td><input type="date" name="sdate" /></td> 
</tr>  
<tr>
    <td>Enrolled Courses</td>
    <?php
        $courses = ["CCICOMP", "CCPROG1", "CCPROG2", "CCPROG3", "ITISORG", "IT-PROG", "ITNET01", "ITSECUR"];
        echo "<td>";
        foreach ($courses as $value => $label){
            echo "<div>
                <input type='checkbox' name='options[]' value='$label'>
                <label>$label</label> <br>
                </div>";
        }
        echo "</td>";
    ?>
</tr>
</table>  
<input type="submit" name="save" value="Submit" /><br /> 
</form> 

    
</body>
</html>