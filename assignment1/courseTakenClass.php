<?php
include_once "functions.php";

class courseTaken{
    public $studentNumber;
    public $courseCode;
    public $courseYear;
    public $courseSemester;
    public $grade;

    function __construct($studentNumber, $courseCode, $courseYear, $courseSemester, $grade){
        $this->studentNumber = $studentNumber;
        $this->courseCode = $courseCode;
        $this->courseYear = $courseYear;
        $this->courseSemester = $courseSemester;
        $this->grade = $grade;

        $doesEntryExist = $this->checkDatabase();

        if($doesEntryExist == FALSE){
            $this->populateDatabase();
        }
    }

    protected function checkDatabase(){
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

    protected function populateDatabase(){
        $itemsSaved = ("\n" . implode(';', get_object_vars($this)));
        file_put_contents('courseTakenDB.csv', $itemsSaved, FILE_APPEND | LOCK_EX);
    }
}