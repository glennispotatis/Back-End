<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>

  <?php

  $data = array(
    array(0, "Dolphin", "Mammal", "Aquatic"),
    array(1, "Frog", "Reptile", "Amphibian"),
    array(2, "Lion", "Mammal", "Terrestrial"),
    array(3, "Gecko", "Reptile", "Terrestrial"),
    array(4, "Penguin", "Bird", "Amphibian"),
    array(5, "Rattlesnake", "Reptile", "Terrestrial"),
    array(7, "Eagle", "Bird", "Terrestrial"),
    array(8, "Salmon", "Fish", "Aquatic"),
    array(9, "Elephant", "Mammal", "Terrestrial"),
    array(10, "Sea Turtle", "Reptile", "Aquatic"),
    array(11, "Shark", "Fish", "Aquatic"),
  );

  // Animals that can live in water 
  // Print from array animals that have "Aquatic" or "Amphibian" tag.
  $lengthArray = count($data);
  //echo array($data);
  //echo $lengthArray;
  echo "These animals can live in water : <br>";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][3] == "Aquatic" || $data[$i][3] == "Amphibian") {
      echo $data[$i][1] . "<br>";
    };
  }


  // Reptiles that can live in water 
  echo "-----------------<br>";
  echo "Reptiles that can live in water : <br>";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Reptile" && $data[$i][3] == "Amphibian" || $data[$i][2] == "Reptile" && $data[$i][3] == "Aquatic") {
      echo $data[$i][1] . "<br>";
    };
  }


  // Animals that are either a bird or are terrestrial but not both 
  echo "-----------------<br>";
  echo "Animals that are either a bird or are terrestrial but not both : <br>";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Reptile" && $data[$i][3] == "Terrestrial" || $data[$i][2] == "Mammal" && $data[$i][3] == "Terrestrial" || $data[$i][2] == "Bird" && $data[$i][3] == "Amphibian") {
      echo $data[$i][1] . "<br>";
    };
  }


  // Create arrays, for each of the class type : Mammals, Reptiles, Birds, Fish.
  // Use a for loop and if/elseif/else statements to populate the arrays with the correct animals names
  echo "-----------------<br>";
  echo "Animals based on class type : <br>";
  echo "Mammals: ";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Mammal") {
      echo $data[$i][1] . ", ";
    };
  }
  echo "<br>";

  echo "Reptiles: ";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Reptile") {
      echo $data[$i][1] . ", ";
    };
  }
  echo "<br>";

  echo "Birds: ";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Bird") {
      echo $data[$i][1] . ", ";
    };
  }
  echo "<br>";

  echo "Fish: ";
  for ($i = 0; $i < $lengthArray; $i++) {
    if ($data[$i][2] == "Fish") {
      echo $data[$i][1] . ", ";
    };
  }
  echo "<br>";

  // Create arrays, for each of the class type : Aquatic, Amphibian, Terrestrial.
  // Use a for loop and switch statements to populate the arrays with the correct animals names
  echo "-----------------<br>";
  echo "Animals based on habitat type : <br>";
  switch($data){
    case "Aquatic";
      echo $data;
      break;
    case "Amphibian";
      echo $data;
      break;
    case "Terrestrial";
      echo $data;
      break;
  }





  ?>


</body>

</html>