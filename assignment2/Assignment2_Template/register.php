<?php
include_once "classes/class_User.php";
include_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Register</h1>
    

    <?php
    $showForm = TRUE; 

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['re_password'];

        

        function validatePassword($password, $confirmPassword)
        {
            if ($password === $confirmPassword) {
                //echo "Passwords are the same";
                return TRUE;
            } else {
                //echo "Passwords are not the same";
                return FALSE;
            }
        }
        //echo validatePassword($password, $confirmPassword);

        function checkUsername($username, $user1)
        {
            $checkUsername = $user1->checkUsername($username);
            if ($checkUsername === TRUE) {
                //echo "Username exists";
                return TRUE;
            } else {
                echo "<p>The entered username does not exist on the system. Contact the administrator.</p>";
                return FALSE;
            }
        }
        //echo checkUsername($username, $user1);

        function formValidation($username, $password, $confirmPassword)
        {
            $user1 = new User($username, $password);
            $validPassword = validatePassword($password, $confirmPassword);
            $validUsername = checkUsername($username, $user1);

            if ($validPassword === TRUE && $validUsername === TRUE) {
                //echo "Valid password and valid username";
                global $showForm;
                $showForm = FALSE;
                $user1->updateUserPassword($username, $password);
            } else {
                echo "<p>Your username and/or password are wrong. Please try again.</p>";
            }
        }
        echo formValidation($username, $password, $confirmPassword);
    }

    function showForm(){
        echo "<form action=\"register.php\" method=\"POST\">";
        echo "<label for=\"username\">Username: </label>";
        echo "<input type=\"text\" name=\"username\" placeholder=\"Username\" required> <br> <br>";
        echo "<label for=\"password\">Password: </label>";
        echo "<input type=\"password\" name=\"password\" placeholder=\"Password\" required> <br> <br>";
        echo "<label for=\"re_password\">Confirm password: </label>";
        echo "<input type=\"password\" name=\"re_password\" placeholder=\"Password\" required> <br> <br>";
        echo "<input type=\"submit\" value=\"Register\" name=\"submit\">";
        echo "</form>";
    }

    if($showForm === TRUE){
        echo showForm();
    }else{
        echo "<p>Welcome, <b>$username</b>!</p>";
        echo "<p>Please click <a href=\"login.php\">here</a> to log in to your account.</p>";
    }
    ?>
</body>

</html>