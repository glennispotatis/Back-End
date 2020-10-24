<?php 
include_once "functions.php";
include_once "classes/studentClass.php";
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
            <li><a href="students.php">Home</a></li>
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
    print_r($_FILES);
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
            print_r($headersArray);
            print_r($valuesArray);


            // call function to create associative array
            $resultArray = createAssocArray($headersArray,$valuesArray);
            print_r($resultArray);
            //createTable($resultArray);

            

            $dataUploaded = TRUE;
            }else{
                echo "No file selected!";
            }

        if($dataUploaded){
            foreach($resultArray as $item){
                $studentNumber = $item['Student number'];
                $firstName = $item['First name'];
                $lastName = $item['Last name'];
                $birthdate = $item['Birthday'];

                $student = new Student($studentNumber, $firstName, $lastName, $birtday);

                //Same for courses & coursetaken
            }
        }
    }
    ?>
</body>

</html>