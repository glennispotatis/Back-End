<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 1 - Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a id="myNameInNav">Glenn Eirik Hansen</a></li>
            <li><a href="students.php" id="active">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="data.php">Upload</a></li>
        </ul>
    </nav>
    <section>
        <h1>Home</h1>
        <?php
        if(file_exists($fileName)){
            echo "File exists";
        }
        //print_r($valuesArray);
        if ($_FILES) {
            
        }
        ?>
    </section>

</body>

</html>