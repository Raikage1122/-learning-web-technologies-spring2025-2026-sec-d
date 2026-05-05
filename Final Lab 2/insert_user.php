<?php
session_start();

$file = "user.txt";

if (isset($_POST['save'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $newUser = $username . "|" . $email . "|" . $password . "\n";

    $f = fopen($file, "a");
    fwrite($f, $newUser);
    fclose($f);

    $_SESSION['user'] = $username;

    echo "User created & logged in!";
}
?>

<form method="post">
    Username:<br>
    <input type="text" name="username"><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="save" value="Create">
</form>