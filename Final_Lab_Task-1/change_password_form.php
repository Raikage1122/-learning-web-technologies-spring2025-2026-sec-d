<?php
$newErr = $retypeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $current = $_POST["current"];
    $new = $_POST["new"];
    $retype = $_POST["retype"];

    if ($new == $current) {
        $newErr = "New Password cannot be same as Current Password";
    }

    if ($new != $retype) {
        $retypeErr = "Passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<fieldset>
<legend>CHANGE PASSWORD</legend>

<form method="post" action="">
Current Password: <input type="password" name="current"><br><br>

New Password: <input type="password" name="new">
<span style="color:red"><?php echo $newErr; ?></span>
<br><br>

Retype New Password: <input type="password" name="retype">
<span style="color:red"><?php echo $retypeErr; ?></span>
<br><br>

<input type="submit" value="Submit">
</form>
</fieldset>

</body>
</html>