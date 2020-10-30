<?php
include_once "functions.php";

class Student{
    //Initial properties
    public $studentNumber;
    public $firstName;
    public $lastName;
    public $birthdate;

    //Constructor setting initial properties and checking database if empty
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

    //Function that is checking the studentDB.csv
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

    //Function that populates the database
    public function populateStudentDatabase(){
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('studentDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }

    //Function that creates an assoc array of the coursesTaken Database
    public function retrieveCoursesTaken(){
        $dataArrays = readFromFile('coursesTakenDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];
        $coursesTakenArray = createAssocArray($headersArray,$valuesArray);
        return $coursesTakenArray;
    }

    //Function that creates an assoc array of the courses database
    public function retrieveCourses(){
        $dataArrays = readFromFile('coursesDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $coursesArray = createAssocArray($headersArray,$valuesArray);

        return $coursesArray;
    }

    //Function that counts Courses Completed
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

    //Function that counts courses failed
    public function setCoursesFailed(){
        $coursesArray = $this->retrieveCoursesTaken();
        $coursesFailed = 0;

        foreach($coursesArray as $item){
            if($item['Student Number'] == $this->studentNumber && $item['Grade'] == 0){
                $coursesFailed++;
            }
        }
        return $coursesFailed;
    }

    //Function that creates an array with credits for the GPA function
    public function getCoursesTakenCredits(){

        $resArray = $this->retrieveCoursesTaken();

        $coursesTakenArr = array();
        $idx = 0;
        foreach ($resArray as $item){
            if ($item['Student Number'] == $this->studentNumber){
                $dataArray = array(
                    'Course Code' => $item['Course Code'],
                    'Course Year' => $item['Course Year'],
                    'Course Semester' => $item['Course Semester'],
                    'Credits' => $this->getCourseCredits($item['Course Code']),
                    'Grade' => $item['Grade']);

                $coursesTakenArr[$idx] = $dataArray;
                $idx++;
            }
        }
        return $coursesTakenArr;
    }

    //Function that uses the previous function to set the course credits
    public function getCourseCredits($courseCode){
        $resArray = $this->retrieveCourses();
        foreach($resArray as $item){
            if($item['Course Code'] == $courseCode){
                return $item['Credits'];
            }
        }
    }

    //Function that sets the GPA for the student
    public function calculateGPA(){
        $coursesTakenArray = $this->getCoursesTakenCredits();
        $creditsTot = 0;
        $creditsWeighted = 0;

        foreach($coursesTakenArray as $item){
            $creditsTot += $item['Credits'];
            $creditsWeighted += $item['Credits'] * $item['Grade'];

            $this->gpa = $creditsWeighted / $creditsTot;
            return $this->gpa;
        }
    }

    //Function that gets the status of the student
    public function getStatus(){
        $grade = $this->calculateGPA();
        switch($grade){
            case $grade < 2:
                $value = 'Unsatisfactory';
                break;
            case $grade < 3:
                $value = 'Satisfactory';
                break;
            case $grade < 4:
                $value = 'Honour';
                break;
            case $grade <= 5:
                $value = 'High Honour';
                break;
        }
        return $value;
    }

    //Function that gets called in students.php, this sends the output to get displayed
    public function output(){
        //Getting the derived properties
        $this->numCoursesTaken = $this->setCoursesCompleted();
        $this->numCoursesFailed = $this->setCoursesFailed();
        $this->gpa = $this->calculateGPA();
        $this->status = $this->getStatus();

        //Sending the array to get displayed
        $outputArray = array(
            'Student Number' => $this->studentNumber,
            'Name' => $this->firstName,
            'Surname' => $this->lastName,
            'Birthdate' => $this->birthdate,
            'No. of Courses Completed' => $this->numCoursesTaken,
            'No. of Courses Failed' => $this->numCoursesFailed,
            'GPA' => round($this->gpa, 2),
            'Status' => $this->status
        );
        return $outputArray;
    }
}