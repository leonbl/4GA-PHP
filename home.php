<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja prva PHP stran</title>
    <?php 
        session_start();
        if($_SESSION['user']){
        }
        else{
            header("location: index.php");
        } 
    ?>
</head>
<body>
    <h2>Domača stran</h2>
    <p>Pozdravljen <?php echo $user?>!</p>
    <a href="logout.php">Odjava</a><br><br>
    <form action="add.php" method="POST">
        Dodaj na seznam: <input type="text" name="details"><br>
        Javna objava? <input type="text" name="public[]" value="yes" ><br>
        <input type="submit" value="Dodaj na seznam">
    </form>
    <h2 align="center">Moj seznam</h2>
    <table border="1px" width="100%">
    <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post time</th>
        <th>Edit time</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Public post</th>
    </tr>
    <?php 
        $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
        $test = mysqli_select_db($mojsql, "baza") or die("Cannot connect to databese..");
        $res=mysqli_query($mojsql, "select * from list");
        while($row = mysqli_fetch_array($res)){
            print "<tr>";
            print '<td align "center">'.$row['id'] . "</td>"; 
            print '<td align "center">'.$row['details'] . "</td>"; 
            print '<td align "center">'.$row['date_posted'] . "-" . $row['time_posted'] . "</td>";
            print '<td align "center">'.$row['date_edited'] . "-" . $row['time_edited'] . "</td>";  
            print '<td align "center"><a href="edit.php">edit</a></td>';
            print '<td align "center"><a href="delete.php">delete</a></td>'; 
            print '<td align "center">'.$row['public'] . "</td>";
            print "</tr>";
        } 
    ?>
    </table>
</body>
</html>