<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
    
    // Algorithm for bubble sort
      
    // function for swaping 2 integer in a 2 value array
    
    
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
    
      
      
    $inputArray = [6,2,0,1,10];
    print_r($inputArray);
    echo "<br>";
    
    bubbleSort($inputArray);
    
       

    
    ?>
   
</body>
</html>