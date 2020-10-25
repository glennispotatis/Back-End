<?php
include_once "functions.php";

class Student{
    public $studentNumber;
    public $firstName;
    public $lastName;
    public $birthdate;

    function __construct($studentNumber, $firstName, $lastName, $birthdate){
        if(empty($studentNumber) == FALSE){
            $this->studentNumber = $studentNumber;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthdate = $birthdate;

            $doesStudentExist = $this->checkStudentDatabase();

            if($doesStudentExist == FALSE){
                $this->populateStudentDatabase();
            }
        }
    }

    public function checkStudentDatabase(){
        $dataArrays = readFromFile('studentDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $resultArray = createAssocArray($headersArray,$valuesArray);

        foreach($resultArray as $item){
            if($item['Student Number'] === $this->studentNumber){
                return TRUE;
            }
        }
    }

    public function populateStudentDatabase(){
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('studentDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }
}