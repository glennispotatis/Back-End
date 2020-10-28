<?php
include_once "functions.php";

class Student{
    public $studentNumber;
    public $firstName;
    public $lastName;
    public $birthdate;

    public $coursesTaken;
    public $numCoursesFailed;
    public $gpa;
    public $status;

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

        foreach($coursesTakenArray as $item){
            if($item['Student Number'] == $this->studentNumber){
                $courseTakenArr = array('Course Code' => $item['Course Code'], 
                                        'Course Year' => $item['Course Year'], 
                                        'Course Semester' => $item['Course Semester'], 
                                        'Grade' => $item['Grade']
                        );
                        $this->setCoursesTaken($courseTakenArr);
            }
        }
    }

    public function setCoursesTaken($courseTakenArr){
        if(empty($this->coursesTaken)){
            $this->coursesTaken = array($courseTakenArr);
        } else {
            array_push($this->coursesTaken, $courseTakenArr);
        }
    }



    public function retrieveCourses(){
        $dataArrays = readFromFile('coursesDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $coursesArray = createAssocArray($headersArray,$valuesArray);

        
    }

    public function calculateGPA(){
        //$gpa = ($course_credit * $grade) / $sumCreditsTaken;
    }

    public function output(){
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