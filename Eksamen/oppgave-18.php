<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php
    ########################### PART 1 ###########################
    $fruits = array("Banana", "Apple", "Pear");

    class Select
    {
        private $name; //Name of the select field
        private $optionsArray; //array of options in the select field

        function __construct($name, $values)
        {
            $this->name = $name;

            if (!is_array($values)) {
                die("Error :value is not an array.");
            } else {
                $this->optionsArray = $values;
            }
            $this->makeSelect();
        }

        // method : create options in the select field
        private function makeOptions($value)
        {
            foreach($value as $item){
                echo "<option value=\"$item\">$item</option>";
            }
        }

        //method : initialize the select field
        private function makeSelect()
        {
            echo "<select name=\"$this->name\">";
            $this->makeOptions($this->optionsArray);
            echo "</select>";
        }
    }
    ?>
    <form>
        <?php
        $select1 = new Select("Fruits", $fruits);
        ?>
    </form>

    <!--########################### PART 2 ###########################-->
    <?php
    echo "<br> <br>";
    $planets = array("Mercury","Venus","Earth","Mars","Jupiter","Saturn","Uranus","Neptune");
    $cars = array("BMW","Jaguar","Tesla","Ferrari","Porsche");
    class Form
    {
        private $sName; //Name of the select field
        private $sName1;
        private $optionsArray; //array of options in the select field
        private $optionsArray1;

        function __construct($sName, $values, $sName1, $values1)
        {
            $this->sName = $sName;
            $this->sName1 = $sName1;

            if (!is_array($values)) {
                die("Error :value is not an array.");
            } else {
                $this->optionsArray = $values;
            }
            if (!is_array($values)) {
                die("Error :value is not an array.");
            } else {
                $this->optionsArray1 = $values1;
            }
            $this->createForm();
        }

        private function createForm(){
            $this->makeInput();
            $this->makeSelect();
            $this->makeSelect1();
            $this->makeSubmit();

        }

        private function makeInput(){
            echo "<label for=\"name\">Name: </label>";
            echo "<input type=\"text\" id=\"name\" name=\"name\"><br>";
        }

        // method : create options in the select field
        private function makeOptions($value)
        {
            foreach($value as $item){
                echo "<option value=\"$item\">$item</option>";
            }
        }

        //method : initialize the select field
        private function makeSelect()
        {
            echo "<label for=\"$this->sName\">Favorite planet: </label>";
            echo "<select name=\"$this->sName\">";
            $this->makeOptions($this->optionsArray);
            echo "</select>";
            echo "<br>";
        }

        private function makeSelect1()
        {
            echo "<label for=\"$this->sName1\">Favorite car: </label>";
            echo "<select name=\"$this->sName1\">";
            $this->makeOptions($this->optionsArray1);
            echo "</select>";
            echo "<br>";
        }

        private function makeSubmit(){
            echo "<input type=\"submit\" value=\"Send\" name=\"submit\">";
        }
    }
    ?>
    <form method="POST">
        <?php
        $form1 = new Form("Planets", $planets, "Cars", $cars);
        ?>
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $favPlanet = $_POST['Planets'];
        $favCar = $_POST['Cars'];

        echo "${name}'s favorite planet is ${favPlanet}";
        echo "<br>";
        echo "${name}'s favorite car is ${favCar}";
    }
    ?>
</body>

</html>