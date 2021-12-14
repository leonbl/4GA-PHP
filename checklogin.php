<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bool = true;
    print_r($_POST);
    print("pičkamarička");
    $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error());
    $res = mysqli_query($mojsql, "select * from users where username='$username'", MYSQLI_USE_RESULT);
    print_r($res);
    $exists = mysqli_num_rows($res);
    print_r($exists);
    $table_users = "";
    $table_passwd = "";
    if($exists > 0){
        while($row = mysqli_fetch_assoc($res)){
            $table_users = $row[1];
            $table_password = $row[2];  
        } 
        if(($username == $table_users)&&($password == $table_passwd)){
            $_SESSION['user'] = $username;
            header("location: home.php");
        }

    } 
    else{
        print '<script>alert("Nepravilno up. ime!")</script>';
        print '<script>window.location.assign("login.php");</script>';
    } 
?>