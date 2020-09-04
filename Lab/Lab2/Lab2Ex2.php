<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
    
<?php
    // define global variable here for gravitational constant
    $G = 6.674E-11;
    
    // create two dimensional array here
    $planet_information = 
    array(
      array("Mercury", 4879, 0.330),
      array("Venus", 12104, 4.87),
      array("Earth", 12756, 5.97),
      array("Mars", 6792, 0.642),
      array("Jupiter", 142984, 1898),
      array("Saturn", 120536, 568),
      array("Uranus", 51118, 86.8),
      array("Neptune", 49528, 102),
    );
?>
    
<?php
    /* Write 2 functions. One for calculating surface gravity and the other for calculating escape velocity. Both functions should take only 2 arguments, the Mass and Diameter of the planets. 
    You should access the global constant G from inside of each function. 
    
    Optional : Create 1 more function to populate the rows of your table in a more efficient manner. 
    Hint : Use dynamic text and concatenation of html tags with php. Be careful of scope. 
    */
    
    /*
    function surfaceGravity($planetMass, $planetDiameter){
      global $G;
      return round(($G * $planetMass*(10**24)) / (($planetDiameter * 1000) / 2) ** 2, 2);
    }
    */
    function surfaceGravity($mass, $diameter) {
      global $G;
      return round(($G * ($mass * (10**24)) / (($diameter * 1000) / 2) **2), 1);  
    };

    function escapeVelocity($mass, $diameter)
    {
        global $G;
        return round(sqrt(2 * $G * ($mass * (10 ** 24)) / (($diameter * 1000) / 2)) / 10 ** 3, 2);
    };
?>
    
    <!-- Create your table here -->
    <h1> Planets in the Solar System</h1>
    <table style="width:50%">
    
    <?php echo
    "
      <tr>
      <th>Names</th>
      <th>Diameter(km)</th>
      <th>Mass(10<sup>24</sup> kg)</th>
      <th>Gravity(m/s<sup>2</sup>)</th>
      <th>Escape Velocity(km/s)</th>
    </tr>
    ";

    foreach ($planet_information as $pi){
      echo
      "<tr>
      <td>". $pi[0]."</td>
      <td>". $pi[1]."</td>
      <td>". $pi[2]."</td>
      <td>". surfaceGravity($pi[2], $pi[1])."</td>
      <td>". escapeVelocity($pi[2], $pi[1])."</td>
      </tr>";
    };
    ?>
    </table>
</body>
</html>