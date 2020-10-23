<?php
require_once "../functions.php";

class Student{
    public $firstName;
    public $lastName;
    public $studentNumber;
    public $birthday;

    public $coursesTaken;
    public $numberOfCoursesCompleted;
    public $numberOfCoursesFailed;
    public $GPA;
    public $status;

    function __construct($studentNumber, $firstName, $lastName, $birthday){
        if(empty($studentNumber) == FALSE){
            $this->studentNumber = $studentNumber;
            $this->$firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthday = $birthday;

            $doesStudentExist = $this->checkStudentDatabase();

            if($doesStudentExist == FALSE){
                $this->populateStudentDatabase();
            }
        }

        function checkStudentDatabase(){
            $dataArrays = readFromFile('studentDatabase.csv');
            $headersArray = $dataArrays['keysArray'];
            $valuesArray = $dataArrays['valuesArray'];

            $resultArray = createAssocArray($headersArray,$valuesArray);

            foreach($resultArray as $item){
                if($item['Student Number'] === $this->studentNumber){
                    return TRUE;
                }
            }
        }

        function populateStudentDatabase(){
            $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
            file_put_contents('studentsDatabase.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
        }

    }
}