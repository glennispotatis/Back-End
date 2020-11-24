<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$user = array("Ashley", "Bale", "Shrek", "Blank");
for($x = 0; $x < count($user) - 1; $x++){
    if($user[$x++] == "Shrek")
    continue;
    printf($user[$x]);
}

$int1 = 12;
$str1 = '12';
if($int1 === $str1){
    echo "TRUE";
}else {
    echo "FALSE";
}

// OPPGAVE 15
echo "<br>";
$income = 15000;
function calculateTax($income){
    if($income <= 10000){
        $tax = 5 * $income / 100;
        return $tax;
    }else if($income <= 20000){
        $tax = 5 * $income / 100;
        $tax1 = 10 * ($income - 10000) / 100;
        $taxes = $tax + $tax1;
        return $taxes;
    }else if($income <= 30000){
        $leftover = $income - 20000;
        $tax = 5 * $income / 100;
        $tax1 = 10 * 10000 / 100;
        $tax2 = 15 * $leftover / 100;
        $taxes = $tax + $tax1 + $tax2;
        return $taxes;
    }else if($income > 30000){
        $leftover = $income - 30000;
        $tax = 5 * $income / 100;
        $tax1 = 10 * 10000 / 100;
        $tax2 = 15 * 10000 / 100;
        $tax3 = 20 * $leftover / 100;
        $taxes = $tax + $tax1 + $tax2 + $tax3;
        return $taxes;
    }
}
echo calculateTax($income);

//OPPGAVE 16
echo "<br>";
$idx = 0;
foreach($parents as $item){
    $idz = 0;
    foreach($parents[$idx] as $item){
        if($item[$idx][$idz]['age'] > 11){
            $name = $item[$idx][$idz]['name'];
            $age = $item[$idx][$idz]['age'];
            $pName = $item[$idx]['name'];
            if($item[$idx][$idz]['gender'] == 'male'){
                echo "${name}, aged ${age}, is the son of ${pName}. <br>";
            }else{
                echo "${name}, aged ${age}, is the daughter of ${pName}. <br>";
            }
            $idz++;
        }
    }
    $idx++;
}
?>
</body>
</html>
