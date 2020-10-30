<?php 
include_once "functions.php"; 
include_once "studentClass.php";
include_once "courseClass.php";
include_once "courseTakenClass.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 1 - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a id="myNameInNav">Glenn Eirik Hansen</a></li>
            <li><a href="students.php" id="active">Students</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="data.php">Upload</a></li>
        </ul>
    </nav>
    <section>
        <h1>Students</h1>
        <?php
        //Reads the student database and creates an associative array
        $dataArrays = readFromFile('studentDB.csv');
        $headersArray = $dataArrays['keysArray'];
        $valuesArray = $dataArrays['valuesArray'];

        $resultArray = createAssocArray($headersArray,$valuesArray);

        $idx = 0;
        //Going through each entry in the student database and creates a new instance of Student class to get displayed on the screen
        foreach($resultArray as $item){
            $student1 = new Student($item['Student Number'], $item['Name'], $item['Surname'], $item['Birthdate']);
            $displayArray[$idx] = $student1->output();
            $idx++;
        }

        //Displays the amount of students
        echo "<span class=\"number-count\">Number of <strong>students</strong>: " . count($displayArray) . "</span>";

        //Gives the sorting key and uses the bubbleSort function to order the array accordingly
        $sortingKey = 'GPA';
        $sortedArray_desc = bubbleSort($displayArray, $sortingKey, 'descending');
        //Creates what the user can see after the sorting has been done.
        createTable($sortedArray_desc);
        ?>
    </section>

</body>

</html>