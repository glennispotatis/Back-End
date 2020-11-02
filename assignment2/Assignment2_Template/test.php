<?php 
// Just a file, where you can test the different classes. 

// testing of classes
require "classes/class_Student.php";
require "classes/class_Employee.php";
require "classes/class_Course.php";
require "classes/class_CourseTaken.php";
include "functions.php";


echo "<pre>";
$employee1 = new Employee('E0002','Raj','Joye');
print_r($employee1);

$stud1 = new Student('S0004','Jack','Frost',getTime('8/16/2001'));
print_r($stud1);

$course1 = new Course('ECSE2041','Electromagnetism','E0002',7);
print_r($course1);

/*
// Careful : running this part multiple times, will add duplicate entries into database

$courseTaken1 = new CourseTaken('S0004','ECSE2041',2019,'Autumn','A');
print_r($courseTaken1);
*/






?>