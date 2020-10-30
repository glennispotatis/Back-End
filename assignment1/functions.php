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

function bubbleSort($input,$key,$order){

    $temp = $input;

    while(TRUE){
        $endOfArray = FALSE;
        $didSwap = FALSE;
        $idx = 0;

            do{
                $x = $temp[$idx];
                $y = $temp[$idx+1];

                $x_param = $x[$key];
                $y_param = $y[$key];

                if(is_null($y)){
                    $endOfArray = TRUE;
                    continue;
                }
                if($order == 'descending'){
                    if($x_param<$y_param){
                        $temp[$idx] = $y;
                        $temp[$idx+1] = $x;

                        $didSwap = TRUE;
                    }
                }
                elseif($order == 'ascending'){
                    if($y_param<$x_param){
                        $temp[$idx] = $y;
                        $temp[$idx+1] = $x;

                        $didSwap = TRUE;
                    }
                }
                else{
                    echo "Invalid order<br>";
                    break;
                }
                $idx++;
            }while($endOfArray == FALSE);//neste do...while loop

            if ($didSwap == FALSE){
                break;
            }
    }//first while loop
    return $temp;
}