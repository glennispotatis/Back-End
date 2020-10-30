<?php
include_once "functions.php";

class Course{
    //Initial properties
    public $courseCode;
    public $courseName;
    public $instructorName;
    public $credits;

    //Constructor that is checking the database and populating it
    function __construct($courseCode, $courseName, $instructorName, $credits){
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->instructorName = $instructorName;
        $this->credits = $credits;

        $doesCourseExist = $this->checkCourseDatabase();

        if($doesCourseExist == FALSE){
            //echo "inConstructDoesCourseExist ";
            $this->populateCourseDatabase();
        }
    }

    //Function that populates the database
    public function populateCourseDatabase(){
        //echo "inPopulateCourseDatabase ";
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('coursesDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }

    //Function that checks the course database
    public function checkCourseDatabase(){
        $dataArrays = readFromFile('coursesDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $resultArray = createAssocArray($headersArray,$valuesArray);

        foreach($resultArray as $item){
            if($item['Course Code'] === $this->courseCode){
                return TRUE;
            }
        }
    }
}