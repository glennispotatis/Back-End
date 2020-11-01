<?php
include_once "functions.php";

class CourseTaken{
    //Initial properties
    protected $studentNumber;
    protected $courseCode;
    protected $courseYear;
    protected $courseSemester;
    protected $grade;

    //The constructor sets the intial properties and checks the database for duplicate keys and then populate the database
    function __construct($studentNumber, $courseCode, $courseYear, $courseSemester, $grade){
        //echo "inConstructCourseT ";
        $this->studentNumber = $studentNumber;
        $this->courseCode = $courseCode;
        $this->courseYear = $courseYear;
        $this->courseSemester = $courseSemester;
        $this->grade = $grade;

        $doesEntryExist = $this->checkDatabase();

        if($doesEntryExist == FALSE){
            //echo "inConstructDoesEntryExist ";
            $this->populateDatabase();
        }
    }

    //Function that is populating the course taken database
    protected function populateDatabase(){
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('coursesTakenDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }

    //Function that is checking the course taken database
    protected function checkDatabase(){
        //echo "inCheckDatabaseCourseT ";
        $dataArrays = readFromFile('coursesTakenDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $resultArray = createAssocArray($headersArray,$valuesArray);

        // FIX THIS!!!
        foreach($resultArray as $item){
            if($item['Student Number'] == $this->studentNumber && $item['Course Code'] == $this->courseCode && $item['Course Year'] == $this->courseYear && $item['Course Semester'] == $this->courseSemester && $item['Grade'] == $this->grade){
                return TRUE;
            }
        }
    }
}