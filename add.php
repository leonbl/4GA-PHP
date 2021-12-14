<?php
    session_start();
    if($_SESSION['user']){
    }
    else{
        header("locaton:index.php");
    } 
    $details = $_POST['details'];
    $time = strftime("%X");
    $date = strftime("%d. %B %Y");
    Print "$time - $date - $details";
?> 