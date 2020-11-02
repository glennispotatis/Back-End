<?php

require_once "class_User.php";

class Employee extends User {
    
    //initial properties
    protected $employeeID;
    protected $name;
    protected $surname;
    
    //derived properties
    protected $coursesAssigned;
    
    function __construct($employeeID, $name, $surname){
        
        $connection = $this->connect();

        $this->employeeID = $this->cleanVar($employeeID,$connection);
        $this->name = $this->cleanVar($name,$connection);
        $this->surname = $this->cleanVar($surname,$connection);
        
        $this->disconnect($connection);
        
        $isNewEmployee = $this->checkIfNewEmployee();
        if($isNewEmployee){
            echo "New Employee!<br>";
            $this->createUser($this->name,$this->surname);
            $this->createEmployeeEntry();
            
        }else {
            echo "Employee exists already!<br>";
        }
    
        
    }
    
    protected function checkIfNewEmployee(){
        $isNewEmployee = TRUE;
        $employeeArray = $this->readFromTable("employees");
        
        echo "<pre>";
        print_r($employeeArray);

        foreach ($employeeArray as $item){
            if ($this->employeeID == $item['employeeid']){
                $isNewEmployee = FALSE;
                //echo "Not New customer!<br>";
                break;
            }
        }    
        return $isNewEmployee;        
    }
    
    protected function createEmployeeEntry(){
        $connection = $this->connect();
        
        //query the database
        $query = "INSERT INTO employees(employeeid,username,name,surname)";
        $query .= "VALUES ('$this->employeeID','$this->username','$this->name','$this->surname')";

        $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        if(!$result){
            die('Employee Creation failed!' . mysqli_error($connection));
        }else {
            echo "New Employee Created!<br>";
        }
        
        $this->disconnect($connection);
    }
    
}



?>