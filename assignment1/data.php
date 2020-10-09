<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 1 - Data</title>
    <link rel="stylesheet" href="style.css">
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


        // call function to create associative array
        $resArray = createAssocArray($headersArray,$valuesArray);
        
        // create table to display content of associative array
        createTable($resArray);
    }
    ?>
</body>

</html>