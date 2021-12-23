<?php
session_start();
if(!$_SESSION['user']){
    header("location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
    $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
    $id = $_GET['id'];
    $res=mysqli_query($mojsql, "delete from list where id='$id'");
    header("location:home.php");
}
?>