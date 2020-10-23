<?php 
require_once "functions.php";
require_once "classes/studentClass.php";
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
            <input type='submit' value='Upload'>
        </form>
    </section>



    <?php
    if(isset($_POST['submit'])){
        $ifFileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];

        if($fileError === 0){
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);

            echo "File uploaded successfully!<br>";

            $dataArrays = readFromFile($fileDestination);
            $headersArray = $dataArrays['keysArray'];
            $valuesArray = $dataArrays['valuesArray'];

            $resArray = createAssocArray($headersArray,$valuesArray);
            
            createTable($resArray);

            $dataUploaded = TRUE;
        }else{
            echo "No file selected!";
        }

        if($dataUploaded){
            foreach($resultArray as $item){
                $studentNumber = $item['Student Number'];
                $firstName = $item['First Name'];
                $lastName = $item['Last Name'];
                $birthdate = $item['Birthday'];

                $student = new Student($studentNumber, $firstName, $lastName, $birtday);

                //Same for courses & corsetaken
            }
        }
    }
    ?>
</body>

</html>