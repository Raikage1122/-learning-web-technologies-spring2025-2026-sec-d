<?php
$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmErr = $genderErr = $dobErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    }

    if ($_POST["password"] != $_POST["confirm"]) {
        $confirmErr = "Passwords do not match";
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<fieldset>
<legend>REGISTRATION</legend>

<form method="post">

Name: <input type="text" name="name">
<span style="color:red"><?php echo $nameErr; ?></span>
<br><br>

Email: <input type="text" name="email">
<span style="color:red"><?php echo $emailErr; ?></span>
<br><br>

User Name: <input type="text" name="username">
<span style="color:red"><?php echo $usernameErr; ?></span>
<br><br>

Password: <input type="password" name="password">
<span style="color:red"><?php echo $passwordErr; ?></span>
<br><br>

Confirm Password: <input type="password" name="confirm">
<span style="color:red"><?php echo $confirmErr; ?></span>
<br><br>

Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
<span style="color:red"><?php echo $genderErr; ?></span>
<br><br>

Date of Birth:
<input type="date" name="dob">
<span style="color:red"><?php echo $dobErr; ?></span>
<br><br>

<input type="submit" value="Submit">
<input type="reset" value="Reset">

</form>
</fieldset>

</body>
</html>