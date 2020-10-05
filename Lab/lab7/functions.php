<?php
function connect(){
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $database = 'booklist';

    $connection = mysqli_connect($host, $user, $password, $database);

    if($connection){
        echo "We are connected!<br>";
    } else {
        die("Database connection failed!<br>");
    };


    return $connection;
};

function disconnect($connection){
    mysqli_close($connection);
}

function getTableInfo($database){
    $connection = connect();

    $query = "SELECT * FROM $database";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query failed!<br>'. mysqli_error($connection));
    }else{
        echo "Entries received!<br>";
    };

    while($row = mysqli_fetch_assoc($result)){
        print_r($row); echo"<br>";
    };

    disconnect($connection);
}

function createCustomer($username, $name, $surname, $address){
    $connection = connect();

    $query = "INSERT INTO customers(username, name, surname, address)";
    $query .= "VALUES customers($username, $name, $surname, $address)";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query Failed!<br>'. mysqli_error($connection));
    }else {
        echo "Entry added!<br>";
    }

    disconnect($connection);
}

function createOrder($isbn, $username, $quantity){
    $connection = connect();

    $query = "INSERT INTO orders(isbn, username, quantity)";
    $query .= "VALUE orders($isbn, $username, $quantity)";

    $result = mysqli_error($connection, $query);

    if(!$result){
        die('Query Failed!<br>'. mysqli_error($connection));
    }else {
        echo "Entry added!<br>";
    }

    disconnect($connection);
}