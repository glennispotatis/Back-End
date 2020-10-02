<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6</title>
</head>

<body>
    <form action="main.php" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">

        <label for="male">Male</label>
        <input type="radio" name="gender" id="male">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female">
        <br>
        <label for="birthday">Enter your birthday: </label> <br>
        <label for="month">Month: </label>
        <select name="month" id="month">
            <option value="january">January</option>
            <option value="february">February</option>
            <option value="mars">Mars</option>
            <option value="april">April</option>
            <option value="may">May</option>
            <option value="june">June</option>
            <option value="july">July</option>
            <option value="august">August</option>
            <option value="september">September</option>
            <option value="october">October</option>
            <option value="november">November</option>
            <option value="december">December</option>
        </select>

        <label for="day">Day: </label>
        <select name="day" id="day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>

        <label for="year_born">Year: </label>
        <input list="birth_year" name="year_born">
        <datalist id="birth_year">
            <?php
            $right_now = getdate();
            $this_year = $right_now['year'];
            $start_year = 1800;
            while ($start_year <= $this_year) {
                echo "<option>{$start_year}</option>";
                $start_year++;
            }
            ?>
        </datalist>
        </input>
        <button type="submit">Send</button>
    </form>
    <?php
    if($birth_year < 1900){
        echo "Sorry, you are a dinosaur. Go back to the Jurrasic Period!";
    };
    ?>
</body>

</html>