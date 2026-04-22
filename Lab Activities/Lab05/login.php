<?php 
// Lab 05 
// Marc Quizon S15 
// Feb 20
session_start(); 
?> 
<html> 
<head> 
<title>Student Learning Portal</title> 
</head> 
<body>
    <h1>Student Learning Portal</h1> 
    <p> 
        Welcome to the <strong>Integrative Programming Learning  
        Portal</strong>. 
        This portal allows students to access system notes, track page visits, and maintain login sessions without using a database. 
    </p> 
    <hr /> 
    <h3>Login to Continue</h3> 
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>"> 
    Username: 
    <input type="text" name="username" required /> 
    <br /><br /> 
    <input type="submit" name="login" value="Enter Portal" /> </form> 
    <p> 
    <em>Note:</em> Your session will remain active until you log out or  close your browser. 
    </p> 

    <?php 
    // 7. Challenge (5pts)
    $validUsers = ['123', '124', '125'];//Create array
    foreach($validUsers as $id){//Iterate each element
        if($_POST["username"] == $id){//Look for matches
            if (isset($_POST["login"])) { //Login once authenticated
            $_SESSION["user"] = $_POST["username"]; 
            header("Location: dashboard.php"); 
            } 
        }
    }
    
?> 
</body> 
</html> 
