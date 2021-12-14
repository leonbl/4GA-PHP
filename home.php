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
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </table>
</body>
</html>