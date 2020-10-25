<?php
include_once "functions.php";

class Course{
    public $courseCode;
    public $courseName;
    public $instructorName;
    public $grade;

    function __construct($courseCode, $courseName, $instructorName, $grade){
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->instructorName = $instructorName;
        $this->grade = $grade;

        $doesCourseExist = $this->checkCourseDatabase();

        if($doesCourseExist == FALSE){
            //echo "inConstructDoesCourseExist ";
            $this->populateCourseDatabase();
        }
    }

    public function populateCourseDatabase(){
        //echo "inPopulateCourseDatabase ";
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('coursesDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }

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