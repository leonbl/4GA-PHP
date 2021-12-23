<!DOCTYPE html>
<html lang="en">
<head>
    <title>Moja testna stran</title>
</head>
<body>
   <?php 
        echo "<p>Deluje!</p>";
   ?>
   <a href="login.php">Prijava</a>
   <a href="register.php">Registracija</a>
</body>
<br>
<h2 align="center">List</h2>
<table border="1px" width="100%">
    <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post time</th>
        <th>Edit time</th>
    </tr>
    <?php 
        $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
        $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
        $res=mysqli_query($mojsql, "select * from list where public='yes'");
        while($row = mysqli_fetch_array($res)){
            print "<tr>";
            print '<td align "center">'.$row['id'] . "</td>"; 
            print '<td align "center">'.$row['details'] . "</td>"; 
            print '<td align "center">'.$row['date_posted'] . "-" . $row['time_posted'] . "</td>";
            print '<td align "center">'.$row['date_edited'] . "-" . $row['time_edited'] . "</td>";  
            print "</tr>";
        } 
    ?>
    </table>

</html>