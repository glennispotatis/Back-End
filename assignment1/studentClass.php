<?php
include_once "functions.php";

class Student{
    public $studentNumber;
    public $firstName;
    public $lastName;
    public $birthdate;

    //public $coursesTaken;
    //public $numCoursesFailed;
    //public $gpa;
    //public $status;

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

    public function retrieveCoursesTaken(){
        $dataArrays = readFromFile('coursesTakenDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];
        $coursesTakenArray = createAssocArray($headersArray,$valuesArray);
        return $coursesTakenArray;
        
    }

    public function retrieveCourses(){
        $dataArrays = readFromFile('coursesDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $coursesArray = createAssocArray($headersArray,$valuesArray);

        return $coursesArray;
    }

    public function setCoursesCompleted(){
        $coursesTakenArray = $this->retrieveCoursesTaken();
        $coursesTaken = 0;

        foreach($coursesTakenArray as $item){
            if($item['Student Number'] == $this->studentNumber){
                $coursesTaken++;
            }
        }
        return $coursesTaken;
    }

    

    public function calculateGPA(){
        //$gpa = ($course_credit * $grade) / $sumCreditsTaken;
    }

    public function output(){
        $this->coursesTaken = $this->setCoursesCompleted();

        $outputArray = array(
            'Student Number' => $this->studentNumber,
            'Name' => $this->firstName,
            'Surname' => $this->lastName,
            'Birthdate' => $this->birthdate,
            'No. of Courses Completed' => $this->coursesTaken,
            'No. of Courses Failed' => $this->numCoursesFailed,
            'GPA' => $this->gpa,
            'Status' => $this->status
        );
        return $outputArray;
    }
}