<?php

require_once "class_Database.php";

class User extends Database {
    
    //initial properties
    protected $username;
    protected $role;
    private $password;
    
    function __construct(){
        
        //use only for login
    }
    
    // create User methods
    protected function createUser($name,$surname){
        echo "User : In createUser<br>";
        
        $this->generateUsername($name,$surname);
        $this->generateDefaultPassword($name,$surname);
        
        $classType = get_class($this);
        if($classType == "Employee"){
            $this->role = 1;
        }elseif($classType == "Student"){
            $this->role = 2;
        }   
        
        echo "username : $this->username <br>";
        echo "role : $this->role<br>";
        echo "password : $this->password <br>";
        
        $this->addUserEntryinDB();
    }
    
    protected function generateUsername($name,$surname){
        echo "User : In generateUsername<br>";
        $str1 = substr($name, 0, 2); // first 2 letters of firstname
        $str1 .= substr($surname, 0, 3); // first 3 letters of lastname
        $string = strtolower($str1); // making lowercase
        
        $isUsernameUnique = FALSE;
        $idx = 0;
        while ($isUsernameUnique == FALSE){
            $username = $string . rand(0,9); // appending a random digit.
            $username .= rand(0,9); // appending a random digit.
            
            $isUsernameUnique = $this->checkIfUsernameUnique($username);
            $idx++;
            
            if($idx >100){
                echo "No unique username could be generated!";
                break;
            }
        }
        
        $this->username = $username;
        
    }
    
    protected function checkIfUsernameUnique($username){
        $isUsernameUnique = TRUE;
        $usersArray = $this->readFromTable("users");

        foreach ($usersArray as $item){
            if ($username == $item['username']){
                $isUsernameUnique = FALSE;
                //echo "Not New customer!<br>";
                break;
            }
        }    
        return $isUsernameUnique; 
        
    }
    
    protected function generateDefaultPassword($name,$surname){
        $this->password = $name . $surname;
    }
        
    // Database methods
    protected function addUserEntryinDB(){
        $connection = $this->connect();
        
        //hash password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        
        //query the database
        $query = "INSERT INTO users(username,role,password)";
        $query .= "VALUES ('$this->username','$this->role','$password_hashed')";

        $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        if(!$result){
            die('User Creation failed!' . mysqli_error($connection));
        }else {
            echo "New User Created!<br>";
        }
        
        $this->disconnect($connection);
    }
    
    
    // Registration Methods
    public function updateUserPassword($username, $password){
        // function to update password upon registration
        $connection = $this->connect();

        $sanUsername = $this->cleanVar($username, $connection);
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        //$query = "UPDATE `users` SET `password` = 'test2' WHERE `users`.`username` = 'glennis'";
        $query1 = "UPDATE `users`";
        $query1 .= " SET `password` = '$password_hashed'";
        $query1 .= " WHERE `users`.`username` = '$sanUsername'";
        //echo $query1;

        $result = mysqli_query($connection, $query1);

        if(!$result){
            die('Changing password failed! ' . mysqli_error($connection));
        }else {
            echo "<p><b>Password updated!</b></p>";
        }

        $this->disconnect($connection);
    }

    public function checkUsername($username){
        //Function to check the username
        $usersArray = $this->readFromTable("users");
        
        foreach($usersArray as $item){
            //Checking username in DB to username entered by the user.
            if($item['username'] === $username){
                return TRUE;
            }
        }
    }
    
    

    
    
}//end class




?>