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
    <title>PHP Assignment 1 - Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a id="myNameInNav">Glenn Eirik Hansen</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="data.php" id="active">Upload</a></li>
        </ul>
    </nav>

    <section>
        <h1>Upload a CSV file</h1>
        <form method="post" action='data.php' enctype='multipart/form-data'>
            Select File : <input type='file' name='filename'>
            <input type='submit' value='Upload' name="submit">
        </form>
    </section>



    <?php
    //print_r($_FILES);
    if(isset($_POST['submit'])){
        $ifFileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        echo "<pre>";
        echo $ifFileName;

        if($_FILES){

            echo "File uploaded successfully!<br>";
            $name = $_FILES['filename']['name'];
            move_uploaded_file($_FILES['filename']['tmp_name'], $name);
            echo "<pre>";
            print_r($_FILES);

            $fileName = $name;
            echo "File name is " . $fileName . "<br><br>";
        
            // call function to read from file and return arrays
            $dataArrays = readFromFile($fileName);
            $headersArray = $dataArrays['keysArray'];
            $valuesArray = $dataArrays['valuesArray'];
            //print_r($headersArray);
            //print_r($valuesArray);


            // call function to create associative array
            $resultArray = createAssocArray($headersArray,$valuesArray);
            //print_r($resultArray);
            //createTable($resultArray);

            foreach($resultArray as $item){
                $stud1 = new Student($item['Student Number'],
                                    $item['Name'],
                                    $item['Surname'],
                                    $item['Birthdate']);

                print_r($stud1);

                $course1 = new Course($item['Course Code'],
                                    $item['Course Name'],
                                    $item['Instructor Name'],
                                    $item['Credits']);
                                    
                
                //print_r($course1);

                $courseTaken1 = new CourseTaken($item['Student Number'],
                                                $item['Course Code'],
                                                $item['Course Year'],
                                                $item['Course Semester'],
                                                $item['Grade']);

                //print_r($courseTaken1); 
            } 

            }else{
                echo "No file selected!";
            }
    }
    ?>
</body>

</html>