<?php include "Lab5_functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 5px;
        }
        th {
        text-align: left;
        }
    </style>
</head>
<body>

<form method="post" action='Lab5_fileUpload.php' enctype='multipart/form-data'>
    Select File : <input type='file' name='filename'>
    <input type='submit' value ='Upload'>
</form>


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


