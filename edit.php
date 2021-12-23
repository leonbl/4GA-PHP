<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urejanje</title>
</head>
<?php
session_start();
if(!$_SESSION['user']) {
    header("location: index.php");
}
$user = $_SESSION['user']; 
$id_exists = false;
?>

<body>
    <h2>Home Page</h2>
    <p>Hello <?php print "$user"?>!</p>
    <a href = "logout.php">Logout..</a><br>
    <a href = "home.php">Return home...</a>
    <h2 align="center">Currently selected</h2>
    <table border="1px" width="100%">
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Post Time</th>
            <th>Edit Time</th>            
            <th>Public Post</th>         
        </tr>
        <?php
            if(!empty($_GET['id'])){
                $id = $_GET['id'];
                $_SESSION['id'] = $id;
                $id_exists = true;
                $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
                $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
                $query=mysqli_query($mojsql, "select * from list");
                $count = mysqli_num_rows($query);
                if($count > 0){
                    while($row = mysqli_fetch_array($query)){
                        print "<tr>";
                        print '<td align "center">'.$row['id'] . "</td>"; 
                        print '<td align "center">'.$row['details'] . "</td>"; 
                        print '<td align "center">'.$row['date_posted'] . "-" . $row['time_posted'] . "</td>";
                        print '<td align "center">'.$row['date_edited'] . "-" . $row['time_edited'] . "</td>";  
                        print '<td align "center">'.$row['public'] . "</td>";
                        print "</tr>";
                    }
                }
                else{
                    $id_exists = false;
                }

            }
        ?>
    </table>
    <br>
    <?php
        if($id_exists){
            print '<form action="edit.php" method="POST">
            Enter new detail: <input type="text" name="details"/><br>
            Public post? <input type="checkbox" name="public[]" value="yes"/><br>
            <input type="submit" value="Update List"/>
            </form>';
        }
        else {
            print '<h2 align="center">There is no data to be edited.</h2>';
        }
    ?>
</body>
</html>

<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
        $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
        $details = $_POST['details'];
        $public = "no";
        $id = $_SESSION['id'];
        $time = strftime("%X");
        $date = strftime("%D %B, %Y");

        foreach($_POST['public'] as $list){
            if($list != null){
                $public = "yes";
            }
        }
        $query=mysqli_query($mojsql, "UPDATE list SET details= '$details', public='$public',
                            date_edited='$date', time_edited='$time' WHERE id='$id'");
        header("location:home.php");
    }
?>