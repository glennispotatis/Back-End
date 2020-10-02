<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading Files</title>
</head>
<body>
<h1>Uploading Files - Lab 5</h1>
    <form method="post" action="lab5.php" enctype='multipart/form-data'>
    <label>Select File: </label> <input type="file" name="filename" size="10">
    <input type="submit" value="Upload">
    </form>

    <?php 
    if ($_FILES){
        echo "Uploaded file successfully! <br>";
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], '$name');
    }
    echo "<pre>";
    $fh = fopen($name, 'r');
    print_r($_FILES);

    while(!feof($fh)){
        $line = fgets($fh);

        $firstLineExtracted == FALSE;
        if($firstLineExtracted == FALSE){
            $keysArray = explode(';', $line);
            $firstLineExtracted = TRUE;
            continue;
        }

        
        
        print_r(explode(';', $line));
    }

    fclose($fh);
    echo "</pre>";
    ?>
</body>
</html>