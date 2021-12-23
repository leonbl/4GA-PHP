<html>
    <head>
        <title>Registracija</title>
    </head>
    <body>
        <h2>
            Registracija
        </h2>
        <a href="index.php">Klikni za zacetno stran</a>
        <br>
        <form action="register.php" method="POST">
            Uporabniško ime: <input type="text" name="username" 
            required="required"                          ><br/>
            Geslo: <input type="password" name="password" 
            required="required"><br>
            <input type="submit" value="Register">
        </form>
    </body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $bool = true;
        $mojsql = mysqli_connect("localhost", "user", "user", "baza") or die(mysqli_error($mojsql));
        $res = mysqli_query($mojsql, "select * from users", MYSQLI_USE_RESULT);
        //print_r($res); 
        if($res){ 
            while($row = mysqli_fetch_row($res)){
                if($username == $row[1] ){
                    $bool = false;
                    print '<script>alert("Uporabniško ime je zasedeno!")</script>';
                } 
            } 
        }  
        if($bool){
            $res=mysqli_query($mojsql, "insert into users (username,password) values('$username','$password')");
            print '<script>alert("Uspešno registriran")</script>';
            print '<script>window.location.assign("login.php");</script>';
        } 
        
    }

?>