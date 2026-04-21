<?php
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
    } else {
        $username = $_POST["username"];

        if (!preg_match("/^[a-zA-Z0-9._-]*$/", $username)) {
            $usernameErr = "Only alpha numeric, period, dash or underscore allowed";
        } elseif (strlen($username) < 2) {
            $usernameErr = "User Name must be at least 2 characters";
        }
    }

    
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        } elseif (!preg_match("/[@#$%]/", $password)) {
            $passwordErr = "Must contain one special character (@,#,$,%)";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<fieldset>
<legend>LOGIN</legend>

<form method="post" action="">
User Name: <input type="text" name="username">
<span style="color:red"><?php echo $usernameErr; ?></span>
<br><br>

Password: <input type="password" name="password">
<span style="color:red"><?php echo $passwordErr; ?></span>
<br><br>

<input type="checkbox"> Remember Me
<br><br>

<input type="submit" value="Submit">
<a href="#">Forgot Password?</a>

</form>
</fieldset>

</body>
</html>