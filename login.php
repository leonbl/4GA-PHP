<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>
    <h2>Prijava</h2>
    <a href="index.php">Vrni se na začetno stran</a><br><br>
    <form action="checklogin.php" method="POST">
        Uporabniško ime: <input type="text" name="username" 
        required="required"><br>
        Geslo: <input type="password" name="password" required="required">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>