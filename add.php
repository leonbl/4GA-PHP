<?php
    session_start();
    if($_SESSION['user']){
    }
    else{
        header("locaton:index.php");
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        $details = $_POST['details'];
        $time = strftime("%X");
        $date = strftime("%d. %B %Y");
        //Print "$time - $date - $details"; echo "<br>";
        $decision = "no";

        $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
        $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
        foreach($_POST['public'] as $check){
            if($check != null) {
                $decision = "yes";
            }
        } 
        $res=mysqli_query($mojsql, "insert into list(details, date_posted, time_posted, public) values('$details', '$date', '$time', '$decision')");
        print_r($res);
        header("location:home.php");
    }
    else{
        header("location:home.php");
    }  

?> 