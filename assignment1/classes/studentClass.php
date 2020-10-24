<?php
include_once "../functions.php";

class Student{
    protected $firstName;
    protected $lastName;
    protected $studentNumber;
    protected $birthday;

    protected $coursesTaken;
    protected $numberOfCoursesCompleted;
    protected $numberOfCoursesFailed;
    protected $GPA;
    protected $status;

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
    }

    protected function checkStudentDatabase(){
        $dataArrays = readFromFile('studentDatabase.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $resultArray = createAssocArray($headersArray,$valuesArray);

        foreach($resultArray as $item){
            if($item['Student number'] === $this->studentNumber){
                return TRUE;
            }
        }
    }

    protected function populateStudentDatabase(){
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('studentsDatabase.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }
}