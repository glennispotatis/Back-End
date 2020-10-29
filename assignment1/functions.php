<?php

function readFromFile($fileName){
    
    $fh = fopen($fileName, 'r') 
        or die ('Failed! Could not open file!');
    
    $firstLineExtracted = FALSE;
    $idx = 0;
    while (!feof($fh)){
    $line = fgets($fh); // read line
        
        if($firstLineExtracted == FALSE){
            // extract first line as keys
            $keysArray = explode(';',$line);
            $firstLineExtracted = TRUE;
            continue;
        }
            
        $lineArray = explode(';',$line);
        if(is_null($lineArray[1])){
            // check if entry in array is null.
        }else{
            $valueArray[$idx] = $lineArray;
            $idx++;
        }

    }

    fclose($fh);

    return array('keysArray' => $keysArray, 'valuesArray' => $valueArray);
    
}

function createAssocArray($headersArray,$valuesArray){
    // create an associative Array given headers and Values
    foreach ($valuesArray as $item => $value){
    //print_r($item);print_r($value);echo "<br>";
    $idx = 0;
        foreach ($headersArray as $key){
            $resultArray[$item][$key] = $value[$idx];        
            $idx++;
        }
    }

    return $resultArray;

}

function createTable($resultArray){
    echo "<table>";
    $isFirstRow = FALSE;
            
    foreach ($resultArray as $item){
        if ($isFirstRow == FALSE){
            // first print headers
            echo "<tr>";
            foreach ($item as $key => $value){
                echo "<th> $key </th>";
            }
            echo "</tr>";
            
            //then print first row of values
            echo "<tr>";
            foreach ($item as $key => $value){
                echo "<td> $value </td>";
            }
            echo "</tr>";
                
            $isFirstRow = TRUE;
                
        }else {
            // then print every subsequent row of values
            echo "<tr>";
            foreach ($item as $key => $value){
                echo "<td> $value </td>";
            }
            echo "</tr>";
        }
    }
}

function bubbleSort($input){
    //echo "inside <br>";
    $iterations = 0;
    $original = $input;
        
    
    while(TRUE){
        $endOfArray = FALSE;
        $didSwap = FALSE;
        $idx = 0;
        while($endOfArray == FALSE){
            echo "idx : " . $idx;
            $x = $input[$idx];
            $y = $input[$idx+1];
            echo " | x: " . $x . " | y: " . $y;
            
            
            if(is_null($y)){
                echo " | y is empty | Continue <br>";
                $endOfArray = TRUE;
                continue;
            }
            
            if($y<$x){
                $input[$idx] = $y;
                $input[$idx+1] = $x;
                
                $didSwap = TRUE;
                echo " | swap | ";
                print_r($input);
                echo "<br>";
            }else{
                echo " | no swap | ";
                print_r($input);
                echo "<br>";
            }
            
            $idx++;
            
        } // second while loop
        
        if ($didSwap == FALSE){
            echo "breaking 1st<br>";
            break;
        }
        
        
        
        $iterations++;
        if($iterations > 5){
            echo "breaking 1st<br>";
            break;
        }
        
            
    } // first while loop

}