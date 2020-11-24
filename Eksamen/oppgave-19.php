<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //PART 1
    //a
    function connect()
    {
        $host = 'localhost';
        $username = 'admin';
        $password = 'admin';
        $database = 'booklist';

        $connection = mysqli_connect($host, $username, $password, $database);

        if ($connection) {
            // echo "Connected!";
        } else {
            die("Connection failed!");
        }

        return $connection;
    }

    //b
    $queries_1 = "UPDATE `customers` SET `address` = $newAddress";
    $queries_2 = "SELECT * WHERE `country` = \'USA\'";
    $queries_3 = "DELETE FROM `customers` WHERE `customers`.`username` = \'TheHulk\'";
    $queries_3_2 = "DELETE FROM `customers` WHERE `customers`.`username` = \'Spiderman\'";

    //c
    //mysqli_query();
    //d
    //fetch_assoc(); 
    ?>
    <!-- PART 2 -->
    <form method="post">
        Username : <input type="text" name="username" value=""> <br>
        Password : <input type="password" name="password" value=""><br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php 
    //a 
    function cleanVar($var, $connection){
        $var = stripslashes($var);
        $var = htmlentities($var);
        $var = strip_tags($var);
        $var = mysqli_real_escape_string($connection, $var);
        return $var;
    }

    //b
    function checkPassword($hashed_password){
        $password = $_POST['password'];
        $hashed_password = $hashed_password;
        if(password_verify($password, $hashed_password)){
            print "Passwords match";
        }else{
            print "Passwords do not match";
        }
    }
    ?>
    
</body>

</html>