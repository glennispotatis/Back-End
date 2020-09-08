<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
    
    // Algorithm for bubble sort

    function bubbleSort($input){
        $temp = $input;
        
        // implement bubblesort algorithm here, use while or do..while loops and/or break and continue statements

        
        
        // temp should be the sorted array
        return $temp;
        

    }
    
      
    // test your function with different input.   
    $inputArray = [4,5,8,2,0,1,10];
    print_r($inputArray);
    echo "<br>";
    
    $sortedArray = bubbleSort($inputArray);
    echo "Sorted Array : ";
    print_r($sortedArray);
    
       

    
    ?>
   
</body>
</html>