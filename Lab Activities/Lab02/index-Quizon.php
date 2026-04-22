<?php 
// Marc Lesley E. Quizon
// Hands-On Exercise No. 2 
// S15 January 23 2026 
ini_set("display_errors", 1); 
error_reporting(E_ALL); 
?> 

<?php 
$courseName="Integrative Programming";
$labNumber=2;
$studentYear=2026;

$totalTopics=5;
$completedTopics=2;
$progressPercent=($completedTopics/$totalTopics) * 100;
?>

<?php
    if ($progressPercent >= 80){
        $progressMessage = "Excellent progress!";
    } elseif ($progressPercent >= 50){
        $progressMessage = "You are more than halfway there.";
    } else{
        $progressMessage="You need to focus more on this lab.";
    }
?>

<?php
$topics = ["HTML", "CSS", "PHP", "Forms", "Databases"];
?>

<?php
$currentTopic="PHP";

switch ($currentTopic){
    case "HTML";
    $focusMessage="You are reviewing page structure.";
    break;
    case "CSS";
    $focusMessage="You are enhancing page design";
    break;
    case "PHP";
    $focusMessage="You are implementing server-side logic";
    break;
    default;
    $focusMessage="Topic not recognized";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML & CSS Refresher</title>
    <link rel="stylesheet" href="style-Quizon-1.css">
</head>
<body>

<header>
    <h1><?php echo $courseName; ?></h1>
    <p>Lab Exercise No.<?php echo $labNumber; ?></p>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>
    <p> Progress Percent: <?php echo $progressPercent; ?> </p>
</header>
<nav>
    <section>
        <p> <strong> <?php echo $progressMessage; ?> </strong> </p>
    </section>
</nav>

<nav>
    <section>
        <h2>Course Topics</h2>
        <?php

        echo "<ul>";
        for ($i=0; $i<count($topics); $i++){

            if($completedTopics>0){
                echo "<li>" . $topics[$i] . " - Completed </li>";
                $completedTopics--;
            }else{
                echo "<li>" . $topics[$i] . " - Pending </li>";
            }
            
            
        }
        echo "</ul>"
        ?>
    </section>
</nav>

<nav>
    <section>
        <p> <?php echo $currentTopic; ?> </p>
        <p> <?php echo $focusMessage; ?> </p>
    </section>
</nav>


<nav> 
    
    <section>
    <h2>HTML5 Overview</h2>
    <p> HTML structures the content of web pages using meaningful elements.</p>
    </section>

    <section>   
        <h2>CSS3 Overview</h2>
        <p>CSS controls layout, design, and visual presentation.</p>
    </section>
</nav>


<footer>
    <p> &copy; <?php echo $studentYear; ?> Integrative Programming Lab</p>
</footer>
    
</body>
</html>