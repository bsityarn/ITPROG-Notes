<!-- // Marc Lesley E. Quizon
// PHP Assignment
// S15 Feb 7, 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_Quizon1.css">

    <style> 
    td:nth-child(even){ 
    background-color: #e0e0e0; 
    width: 200px; 
    } 
</style> 
</head>
<body>

<img src="images/DLSU_logo.png" alt="DLSU logo">
<h1>Course Progress Tracker<h1>
<hr /> <!-- Prints a line -->
<form method="post" action="Process_form.php">
    <table>
        <tr>
            <td><p>Enter a name:<p></td>
            <td><input type="text" name="sname" size="25" required/></td>
        </tr>
        <tr>
            <td><p>Select program:<p></td>
            <td><select name="program">
            <option value="BSIT">BSIT</option>
            <option value="BSCS-ST">BSCS-ST</option>
            <option value="BSIS">BSIS</option>
        </tr> 
        <tr>
            <td><p>Select a course:<p></td>
            <td><select name="course">
            <option value="CCICOMP">CCICOMP</option>
            <option value="CCPROG3">CCPROG3</option>
            <option value="CCINFOM">CCINFOM</option>
        </tr>
        <tr>
            <td><p>Completed Topics:<p></td>
            <td><select name="completed">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </tr>
    </table>
    <input type="submit" name="save" value="Submit" /><br /> 
</form>
 
    
</body>
</html>