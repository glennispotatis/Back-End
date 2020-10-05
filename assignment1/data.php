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

    if ($_FILES) {
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
        $resArray = createAssocArray($headersArray, $valuesArray);

        // create table to display content of associative array
        createTable($resArray);
    }

    function readFromFile($fileName)
    {

        $fh = fopen($fileName, 'r')
            or die('Failed! Could not open file!');

        $idx = 0;
        $firstLineExtracted == FALSE;
        while (!feof($fh)) {
            $line = fgets($fh); // read line

            if ($firstLineExtracted == FALSE) {
                // extract first line as keys
                $keysArray = explode(';', $line);
                $firstLineExtracted = TRUE;
                continue;
            }

            $lineArray = explode(';', $line);
            if (is_null($lineArray[1])) {
                // check if entry in array is null.
            } else {
                $valueArray[$idx] = $lineArray;
                $idx++;
            }
        }

        fclose($fh);

        return array('keysArray' => $keysArray, 'valuesArray' => $valueArray);
    }

    function createAssocArray($headersArray, $valuesArray)
    {
        // create an associative Array given headers and Values
        foreach ($valuesArray as $item => $value) {
            //print_r($item);print_r($value);echo "<br>";
            $idx = 0;
            foreach ($headersArray as $key) {
                $resArray[$item][$key] = $value[$idx];
                $idx++;
            }
        }

        return $resArray;
    }

    function createTable($resArray)
    {
        echo "<table>";

        foreach ($resArray as $item) {

            echo "<tr>";

            if ($isFirstRow == FALSE) {

                foreach ($item as $key => $value) {
                    echo "<th> $key </th>";
                }
                $isFirstRow = TRUE;
            } else {

                foreach ($item as $key => $value) {
                    echo "<td> $value </td>";
                }
            }

            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>